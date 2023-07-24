<?php


namespace WeIOT\PhpSdk\Provider\Company;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;


class SmsManager {


    public static $Provider = "";
    public static $Customer = "";
    public static $Message = "";

    public static function send($Config, $developerAuthToken, $companyAccessToken, $smsProvider, $customerId, $messageContent): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/sms/send?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'sms_provider'          => $smsProvider,
                'customer_id'           => $customerId,
                'customer_message'      => $messageContent
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


}