<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XeroToken;
use GuzzleHttp\Client;

class XeroAuthController extends Controller
{
    public function connect()
    {
        $scopes = 'offline_access accounting.transactions accounting.contacts.read accounting.contacts';
        $url = 'https://login.xero.com/identity/connect/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => config('xero.client_id'),
            'redirect_uri' => config('xero.redirect_uri'),
            'scope' => $scopes,
            'state' => csrf_token(),
        ]);

        return redirect()->away($url);
    }

    public function callback(Request $request)
    {
        try {
            $code = $request->code;
            if (!$code) {
                return response('No authorization code provided by Xero.', 400);
            }

            $client = new \GuzzleHttp\Client(['verify' => false]);

            $response = $client->post('https://identity.xero.com/connect/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(config('services.xero.client_id') . ':' . config('services.xero.client_secret')),
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => config('services.xero.redirect_uri'),
                ],
            ]);

            $tokenData = json_decode($response->getBody(), true);

            $tenantResponse = $client->get('https://api.xero.com/connections', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $tokenData['access_token'],
                    'Accept' => 'application/json',
                ],
            ]);

            $tenant = json_decode($tenantResponse->getBody(), true)[0];

            \App\Models\XeroToken::updateOrCreate(
                ['tenant_id' => $tenant['tenantId']],
                [
                    'access_token' => $tokenData['access_token'],
                    'refresh_token' => $tokenData['refresh_token'],
                    'expires_at' => now()->addSeconds($tokenData['expires_in']),
                ]
            );

            return redirect('/')->with('success', 'Connected to Xero successfully!');
        } catch (\Throwable $e) {
            return response('Xero callback failed: ' . $e->getMessage(), 500);
        }
    }
}
