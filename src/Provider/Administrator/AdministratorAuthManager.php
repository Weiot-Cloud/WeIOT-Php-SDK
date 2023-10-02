<?php


namespace WeIOT\PhpSdk\Provider\Administrator;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;

class AdministratorAuthManager {


    /**
     * @param $Config
     * @param $developerAuthToken
     * @return mixed
     * @throws WeIOTException
     * @throws GuzzleException
     * @example Get system admin auth token with works
     */
    public static function login($Config, $developerAuthToken,$adminAuthToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/admin/verify?initial=%s',$adminAuthToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'id'            => $Config->devID,
                'app'           => $Config->appID,
                'key'           => $Config->devKey,
                'token'         => $Config->devToken
            ]
        ]);

        return json_decode($response->getBody());

    }


}