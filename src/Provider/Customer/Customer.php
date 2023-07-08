<?php


namespace WeIOT\PhpSdk\Provider\Customer;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;

class Customer {


    /**
     * @param $Config
     * @param $developerAuthToken
     * @param $companyAccessToken
     * @return mixed
     * @throws WeIOTException
     * @throws GuzzleException
     */
    public static function records($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/customers?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        if($responseCheck->status !== "success")
            throw new WeIOTException($responseCheck->message);

        return $responseCheck->result;

    }



    /**
     * @param $Config
     * @param $developerAuthToken
     * @param $customerId
     * @param $companyAccessToken
     * @return mixed
     * @throws GuzzleException
     * @throws WeIOTException
     */
    public static function profile($Config, $developerAuthToken, $companyAccessToken, $customerId): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/customer/%s?initial=%s',$customerId,$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        if($responseCheck->status !== "success")
            throw new WeIOTException($responseCheck->message);

        return $responseCheck->result;

    }


    public static function reminders($Config, $developerAuthToken, $companyAccessToken,$customerID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/customer/%s/reminders?initial=%s',$customerID, $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        if($responseCheck->status !== "success")
            throw new WeIOTException($responseCheck->message);

        return $responseCheck->result;

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

        if($responseCheck->status !== "success")
            throw new WeIOTException($responseCheck->message);

        return $responseCheck->result;

    }



}