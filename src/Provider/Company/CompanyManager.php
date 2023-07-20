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

}