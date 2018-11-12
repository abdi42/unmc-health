<?php

namespace App\Services;
use App\Subject;
use GuzzleHttp\Client;
use Carbon\Carbon;

class iHealth
{
    private $client = null;
    private $baseUrl = null;

    function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = "https://api.ihealthlabs.com:8443/openapiv2/";
    }

    function getHealthData($endpoint, $sc, $sv, $access_token = null)
    {
        if ($access_token == null) {
            $access_token = getenv('ACCESS_TOKEN');
        }

        $url = $this->baseUrl . $endpoint; // Enter the URL to fetch the User Profile of all users

        $response = $this->client->request('GET', $url, [
            'query' => [
                'client_id' => getenv('CLIENT_ID'),
                'client_secret' => getenv('CLIENT_SECRET'),
                'redirect_uri' => getenv('REDIRECT_URI'),
                'access_token' => $access_token,
                'sc' => $sc,
                'sv' => $sv
            ]
        ]);

        $body = json_decode($response->getBody());

        return $body;
    }

    public function getNewToken(Subject $subject, $code)
    {
        $url = $this->baseUrl . '/OAuthv2/userauthorization/'; // Enter the URL to fetch the User Profile of all users
        $query = [
            'client_id' => getenv('CLIENT_ID'),
            'client_secret' => getenv('CLIENT_SECRET'),
            'redirect_uri' =>
                getenv('REDIRECT_URI') . '?subject_code=' . $subject->subject
        ];

        if (Carbon::parse($subject->expires_in)->lt(Carbon::now())) {
            $query['response_type'] = 'refresh_token';
            $query['refresh_token'] = $subject->refresh_token;
        } else {
            $query['grant_type'] = 'authorization_code';
            $query['code'] = $code;
        }

        $response = $this->client->request('GET', $url, ['query' => $query]);

        $body = json_decode($response->getBody());

        return $body;
    }

    public function weights($userId, $access_token)
    {
        return $this->getHealthData(
            'user/' . $userId . '/weight.json',
            getenv('SC_WEIGHT'),
            getenv('SV_WEIGHT'),
            $access_token
        );
    }

    public function bloodPressure($userId, $access_token)
    {
        return $this->getHealthData(
            'user/' . $userId . '/bp.json',
            getenv('SC_BP'),
            getenv('SV_BP'),
            $access_token
        );
    }

    public function bloodGlucose($userId, $access_token)
    {
        return $this->getHealthData(
            'user/' . $userId . '/glucose.json',
            getenv('SC_BG'),
            getenv('SV_BG'),
            $access_token
        );
    }

    public function pulseOxygen($userId, $access_token)
    {
        return $this->getHealthData(
            'user/' . $userId . '/spo2.json',
            getenv('SC_SPO2'),
            getenv('SV_SPO2'),
            $access_token
        );
    }
}
