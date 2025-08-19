<?php

declare(strict_types=1);

use App\Exceptions\InvalidRefreshToken;
use App\Exceptions\OauthClientNotSetException;
use App\Exceptions\UserNotFoundException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

function generateRandomPassword(): string
{
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $randomString = substr(str_shuffle($data), 0, 8);

    return $randomString;
}

function generateGameToken(): string
{
    return Uuid::uuid1()->toString();
}

function generateOtp(int $length = 4): int
{
    return random_int((int) (pow(10, $length - 1)), (int) (pow(10, $length)));
}

function getEmailColumn(Model $column, string $attributeName): string
{
    if ($column[$attributeName]) {
        return "<a href='mailto:".$column[$attributeName]."'>
        <i class='fa fa-envelope mr-1'></i>".$column[$attributeName].'</a>';
    }

    return '';
}

/**
 * @return null|string
 */
function getDateColumnFromDate(object $date)
{
    $html = '<p data-toggle="tooltip" data-placement="bottom" title="${dateHuman}">${date}</p>';

    $dateObj = new Carbon($date);

    $html = preg_replace('/\$\{date\}/', $dateObj->format('l jS F Y (h:i:s a)'), $html);
    $html = preg_replace('/\$\{dateHuman\}/', $dateObj->diffForHumans(), (string) $html);

    return $html;
}

function getUser(): User
{
    $user = auth()->user();

    if (! $user) {
        throw new UserNotFoundException();
    }

    return $user;
}

function createToken(string $email, string $password): stdClass
{
    $client = $client = getPassportClient();

    $request = Request::create(
        '/oauth/token',
        'POST',
        [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '',
        ]
    );

    $result = app()->handle($request);

    return json_decode((string) $result->getContent());
}

function refreshToken(string $refreshToken): object
{
    $client = getPassportClient();

    $request = Request::create(
        'oauth/token',
        'POST',
        [
            'grant_type' => 'refresh_token',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'refresh_token' => $refreshToken,
            'scope' => '',
        ]
    );

    $result = app()->handle($request);

    $tokenData = json_decode((string) $result->getContent());

    if (! isset($tokenData->access_token)) {
        throw new InvalidRefreshToken();
    }

    return $tokenData;
}

function getPassportClient(): stdClass
{
    $oauthClient = DB::table('oauth_clients')
        ->where('password_client', true)
        ->first();

    if (! $oauthClient) {
        throw new OauthClientNotSetException();
    }

    return $oauthClient;
}

/**
 * @return null|int
 */
function getUserRanking(User $user, ?string $country = null)
{
    if (null === $country) {
        $userGlobalRank = DB::select(
            (string) DB::raw(
                'SELECT position FROM
                (SELECT user_id, RANK() OVER
                (ORDER BY score DESC, achieve_time ASC, users.nickname ASC) AS position
                FROM highest_scores
                JOIN users ON users.id = highest_scores.user_id
                GROUP BY user_id, score, achieve_time, users.nickname) q
                WHERE q.user_id=:userid'
            ),
            [
                'userid' => $user->id,
            ]
        );

        return ($userGlobalRank) ? $userGlobalRank[0]->position : null;
    }

    $userCountryRank = DB::select(
        (string) DB::raw(
            'SELECT position FROM
            (SELECT user_id, RANK() OVER
            (ORDER BY score DESC, achieve_time ASC, u.nickname ASC) AS position
            FROM highest_scores h JOIN users u ON u.id=h.user_id
            WHERE u.country_id=:country GROUP BY user_id, score, achieve_time, u.nickname) q
            WHERE q.user_id=:userid'
        ),
        [
            'userid' => $user->id,
            'country' => $country,
        ]
    );

    return ($userCountryRank) ? $userCountryRank[0]->position : null;
}

function isPasswordsSame(string $oldPassword, string $newPassword): bool
{
    return Hash::check($newPassword, $oldPassword);
}

function getHashCode(string $password): string
{
    $hashedPassword = Hash::make($password);

    return $hashedPassword;
}
