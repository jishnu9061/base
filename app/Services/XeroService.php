<?php

namespace App\Services;

use App\Models\XeroToken;
use GuzzleHttp\Client;
use XeroAPI\XeroPHP\Api\AccountingApi;
use XeroAPI\XeroPHP\Configuration;

class XeroService
{
    protected $api;
    protected $tenantId;

    public function __construct()
    {
        $token = XeroToken::latest()->first();

        $config = Configuration::getDefaultConfiguration()
            ->setAccessToken($token->access_token)
            ->setHost('https://api.xero.com/api.xro/2.0');

        $this->api = new AccountingApi(
            new Client([
                'verify' => false,
            ]),
            $config
        );

        $this->tenantId = $token->tenant_id;
    }

    public function getOrCreateContact($resident)
    {
        if ($resident->xero_contact_id) return $resident->xero_contact_id;

        $contact = new \XeroAPI\XeroPHP\Models\Accounting\Contact([
            'name' => $resident->group_name,
            'emailAddress' => $resident->members->first()->email ?? null,
        ]);

        $contacts = new \XeroAPI\XeroPHP\Models\Accounting\Contacts();
        $contacts->setContacts([$contact]);

        $result = $this->api->createContacts($this->tenantId, $contacts);
        $xeroId = $result->getContacts()[0]->getContactID();

        $resident->update(['xero_contact_id' => $xeroId]);

        return $xeroId;
    }

    public function createOrUpdateInvoice($transaction)
    {
        $resident = $transaction->resident;
        $contactId = $this->getOrCreateContact($resident);

        $invoice = new \XeroAPI\XeroPHP\Models\Accounting\Invoice([
            'type' => 'ACCREC',
            'contact' => ['contactID' => $contactId],
            'date' => now()->toDateString(),
            'dueDate' => now()->addDays(14)->toDateString(),
            'lineItems' => [
                [
                    'description' => $transaction->description ?? 'Resident Charge',
                    'quantity' => 1,
                    'unitAmount' => $transaction->amount,
                    'accountCode' => '200'
                ]
            ],
            'status' => 'AUTHORISED'
        ]);

        $invoices = new \XeroAPI\XeroPHP\Models\Accounting\Invoices();
        $invoices->setInvoices([$invoice]);

        $response = $this->api->createInvoices($this->tenantId, $invoices);
        $invoiceId = $response->getInvoices()[0]->getInvoiceID();

        $transaction->update(['xero_invoice_id' => $invoiceId]);
    }

    public function syncInvoicesFromXero()
    {
        $response = $this->api->getInvoices($this->tenantId);
        $invoices = $response->getInvoices();

        foreach ($invoices as $invoice) {
            $resident = \App\Models\Resident::where('xero_contact_id', $invoice->getContact()->getContactID())->first();
            if ($resident) {
                \App\Models\Transaction::updateOrCreate(
                    ['xero_invoice_id' => $invoice->getInvoiceID()],
                    [
                        'resident_id' => $resident->id,
                        'amount' => $invoice->getTotal(),
                        'status' => $invoice->getStatus(),
                        'issued_at' => $invoice->getDate(),
                        'due_at' => $invoice->getDueDate(),
                    ]
                );
            }
        }
    }
}
