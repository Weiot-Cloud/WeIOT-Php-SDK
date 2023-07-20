<?php


namespace WeIOT\PhpSdk\Provider\Customer;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\ConfigInterface;
use WeIOT\PhpSdk\Exception\WeIOTException;

class Authentication {

    public static function login(ConfigInterface $Config, $developerAuthToken, $email, $password) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', '/api/v1/app/access/company/customer/login');

        $response = $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'email'    => $email,
                'password'   => $password
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    public static function reset(ConfigInterface $Config, $developerAuthToken, $email) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', '/api/v1/app/access/company/customer/reset');

        $response = $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'email'    => $email
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }


    public static function profile(ConfigInterface $Config, $customerToken) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', '/api/v1/app/access/company/customer/profile');

        $response = $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$customerToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }


    public static function folders(ConfigInterface $Config, $customerToken) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', '/api/v1/app/access/company/customer/folders');

        $response = $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$customerToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


}