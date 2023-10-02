<?php


namespace WeIOT\PhpSdk\Provider\Customer;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Exception\WeIOTException;
use GuzzleHttp\Promise;


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

        return $responseCheck;

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
    public static function profile($Config, $developerAuthToken, $companyAccessToken, $customerIdorIDS, $multiple = false ): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);

        if(is_array($customerIdorIDS) && $multiple):

            $promises   = [];
            $export     = [];

            foreach ($customerIdorIDS as $keys => $ID):

                $promises[$keys] =  $client->getAsync(sprintf('/api/v1/app/access/company/customer/%s?initial=%s',$ID,$companyAccessToken), [
                    'headers' => [
                        
                        
                        'Authorization' => sprintf('Bearer %s',$developerAuthToken)
                    ] 
                ]);

            endforeach;

            $responses = Promise\Utils::unwrap($promises);

            foreach ($responses as $key => $respons):

                $export[$key] = json_decode($respons->getBody());

            endforeach;

            return $export;

        else:

            $request    = new Request('GET', sprintf('/api/v1/app/access/company/customer/%s?initial=%s',$customerIdorIDS,$companyAccessToken));

            $response =  $client->send($request, [
                'headers' => [
                    
                    
                    'Authorization' => sprintf('Bearer %s',$developerAuthToken)
                ]
            ]);

            $responseCheck = json_decode($response->getBody());

            return $responseCheck;

        endif;



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

        return $responseCheck;

    }


    public static function reminder($Config, $developerAuthToken, $companyAccessToken,$reminderID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/access/company/reminder/%s?initial=%s',$reminderID, $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }



}