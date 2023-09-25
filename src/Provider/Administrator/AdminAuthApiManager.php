<?php


namespace WeIOT\PhpSdk\Provider\Administrator;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;

class AdminAuthApiManager {


    /**
     * @param $Config
     * @param $systemAuthToken
     * @param $companyID
     * @return mixed
     * @throws GuzzleException
     */
    public static function getEmployers($Config, $systemAuthToken, $companyID)  {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/system/company/%s/employers',$companyID));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$systemAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    /**
     * @param $Config
     * @param $systemAuthToken
     * @param $employerID
     * @return mixed
     * @throws GuzzleException
     */
    public static function getEmployer($Config, $systemAuthToken, $employerID)  {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/system/company/employer/%s',$employerID));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$systemAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    /**
     * @param $Config
     * @param $systemAuthToken
     * @param $companyID
     * @return mixed
     * @throws GuzzleException
     */
    public static function getCustomers($Config, $systemAuthToken, $companyID)  {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/system/company/%s/customers',$companyID));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$systemAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    /**
     * @param $Config
     * @param $systemAuthToken
     * @param $customerID
     * @return mixed
     * @throws GuzzleException
     */
    public static function getCustomer($Config, $systemAuthToken, $customerID)  {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/system/company/customer/%s',$customerID));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$systemAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }



}