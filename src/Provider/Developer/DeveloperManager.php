<?php


namespace WeIOT\PhpSdk\Provider\Developer;
 
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use WeIOT\PhpSdk\Config;
use WeIOT\PhpSdk\ConfigInterface;
use WeIOT\PhpSdk\Exception\WeIOTException;

class DeveloperManager extends WeIOTException{


    /**
     * @param ConfigInterface $Config
     * @return mixed
     * @throws WeIOTException
     * @throws WeIOTException|GuzzleException
     */
    public static function login(ConfigInterface $Config) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', 'api/v1/verify');

        $response = $client->send($request, [
            'form_params' => [
                'id'    => $Config->devID,
                'app'   => $Config->appID,
                'token' => $Config->devToken,
                'key'   => $Config->devKey,
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }


    /**
     * @param ConfigInterface $Config
     * @return mixed
     * @throws WeIOTException
     * @throws WeIOTException|GuzzleException
     */
    public static function adminLogin(ConfigInterface $Config, $adminLoginAppToken) : mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf("api/v1/admin/verify?initial%s",$adminLoginAppToken));

        $response = $client->send($request, [
            'form_params' => [
                'id'    => $Config->devID,
                'app'   => $Config->appID,
                'token' => $Config->devToken,
                'key'   => $Config->devKey,
            ]
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

}