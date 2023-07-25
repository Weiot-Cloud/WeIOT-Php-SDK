<?php


namespace WeIOT\PhpSdk\Provider\Company;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;


class NotificationManager {


    public static function send($Config, $developerAuthToken, $companyAccessToken, $target, $targetValue, $title, $content): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/notification/send?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'target'            => $target,
                'target_value'      => $targetValue,
                'title'             => $title,
                'content'           => $content
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


}