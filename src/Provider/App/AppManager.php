<?php


namespace WeIOT\PhpSdk\Provider\App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Config;
use WeIOT\PhpSdk\Exception\WeIOTException;

class AppManager extends WeIOTException {


    /**
     * @param $Config
     * @param $developerAuthToken
     * @return mixed
     * @throws WeIOTException
     * @throws GuzzleException
     */
    public static function profile($Config, $developerAuthToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', '/api/v1/app/profile');

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    /**
     * @param $Config
     * @param $developerAuthToken
     * @return mixed
     * @throws WeIOTException
     * @throws GuzzleException
     */
    public static function salesChecking($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/sales/company/check?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

}