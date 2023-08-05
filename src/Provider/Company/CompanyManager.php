<?php


namespace WeIOT\PhpSdk\Provider\Company;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;

class CompanyManager {


    public static function short($Config, $developerAuthToken, $companyAccessToken, $shortPrefix): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/short/%s/view?initial=%s',$shortPrefix,$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function offices($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/offices?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function employers($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/employers?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function employer($Config, $developerAuthToken, $companyAccessToken, $employerID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/employer/%s?initial=%s',$employerID,$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function reminders($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/reminders?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function reminder($Config, $developerAuthToken, $companyAccessToken,$reminderID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/reminder/%s/view?initial=%s',$reminderID, $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function configs($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/configs?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function config($Config, $developerAuthToken, $companyAccessToken,$prefix): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/config?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'prefix'          => $prefix
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function mentions($Config, $developerAuthToken, $companyAccessToken,$prefix): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/mentions?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }
    public static function employerProfileWithCustomerToken($Config, $customerAuthToken, $employerID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/company/employer/%s/profile',$employerID));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$customerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

}