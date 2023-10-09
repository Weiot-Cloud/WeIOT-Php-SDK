<?php


namespace WeIOT\PhpSdk\Provider\Company;

use GuzzleHttp\Promise;
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

    public static function employer($Config, $developerAuthToken, $companyAccessToken, $employerIDorIDS, $multiple = false): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);


        if(is_array($employerIDorIDS) & $multiple):

            $promises   = [];
            $export     = [];

            foreach ($employerIDorIDS as $keys => $ID):

                $promises[$keys] =  $client->getAsync( sprintf('/api/v1/app/access/company/employer/%s?initial=%s',$ID,$companyAccessToken), [
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
            $request    = new Request('GET', sprintf('/api/v1/app/access/company/employer/%s?initial=%s',$employerIDorIDS,$companyAccessToken));

            $response =  $client->send($request, [
                'headers' => [
                    
                    
                    'Authorization' => sprintf('Bearer %s',$developerAuthToken)
                ]
            ]);

            $responseCheck = json_decode($response->getBody());


            return $responseCheck;
        endif;

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

    public static function configs($Config, $developerAuthToken, $companyAccessToken): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/configs?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function config($Config, $developerAuthToken, $companyAccessToken,$prefix): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/config?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [
                'prefix'          => $prefix
            ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function mentions($Config, $developerAuthToken, $companyAccessToken,$prefix): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/mentions?initial=%s', $companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }

    public static function employerProfileWithCustomerToken($Config, $customerAuthToken, $employerID): mixed {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/company/employer/%s/profile',$employerID));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$customerAuthToken)
            ],
            'form_params' => [ ]
        ]);

        $responseCheck = json_decode($response->getBody());


        return $responseCheck;

    }


    /**
     * @param $Config
     * @param $developerToken
     * @param array $data
     * @return mixed
     * @throws \Exception
     *
     * type = Bireysel ya da Kurumsal | ["individual","corporate"]
     *
     * [ Bireysel Hesap ] Bireysel hesap zorunlu bilgiler
     *
     * name                     = İsim (Kişisel Bilgisi)
     * surname                  = Soyisim (Kişisel Bilgisi)
     * gender                   = Cinsiyet | ["gender_male","gender_female","gender_other"] (Kişisel Bilgisi)
     * birthday                 = Doğum Tarihi | Y-m-d (Yıl-Gün) (Kişisel Bilgisi)
     * marital_status           = Medeni Durumu | ["marital_married","marital_single","marital_widow"] (Kişisel Bilgisi)
     * phone_mobile             = Cep Telefonu | +90XXXXXXXXXX şeklinde +[Ülke Kodu] olacak şekilde olmalıdır (Kişisel Bilgisi)
     * phone_local              = Sabit Telefonu | +90XXXXXXXXXX şeklinde +[Ülke Kodu] olacak şekilde olmalıdır (Kişisel Bilgisi)
     * phone_fax                = Faks Telefonu | +90XXXXXXXXXX şeklinde +[Ülke Kodu] olacak şekilde olmalıdır (Kişisel Bilgisi)
     * email                    = E-Posta Adresi (Kişisel Bilgisi)
     * country                  = Ülkesi (Kişisel Bilgisi)
     * city                     = Şehiri (Kişisel Bilgisi)
     * district                 = İlçesi (Kişisel Bilgisi)
     * address                  = Adresi (Kişisel Bilgisi)
     * postcode                 = Posta Kodu (Kişisel Bilgisi)
     *
     *
     * -------------------------------------------------------------
     *     CompanyManager::createCustomer(
                $Config,
                $developerLogin->result->token,
                [
                "type"                      => "individual",
                "name"                      => "Lorem",
                "surname"                   => "IPSUM",
                "gender"                    => "gender_male",
                "birthday"                  => "1990-10-10",
                "marital_status"            => "marital_single",
                "phone_mobile"              => "+905555555555",
                "phone_local"               => "+905555555555",
                "phone_fax"                 => "+905555555555",
                "email"                     => "lorem@ipsum.com",
                "country"                   => "Türkiye",
                "city"                      => "Adana",
                "district"                  => "Seyhan",
                "address"                   => "Lorem ipsum sokak, Loram Apt. Kat:1 D:1",
                "postcode"                  => "000000",
                "passport_type"             => "passport_type_a",
                "passport_number"           => "U786756545",
                "passport_expiry_date"      => "2032-10-10",
                "citizenship_number"        => "12345678901"
                ]
            );
     *  -------------------------------------------------------------
     * passport_type            = Pasaport Tipi
     * --------------------------------------------------------------
     * "passport_type_a"        => "Standart Pasaport (Bordo)",     -
     * "passport_type_b"        => "Hizmet Pasaportu (Yeşil)",      -
     * "passport_type_c"        => "Özel Pasaport (Gri)",           -
     * "passport_type_d"        => "Diplomatik Pasaport (Siyah)",   -
     * --------------------------------------------------------------
     * passport_number          = Pasaport Numarası                 -
     * passport_expiry_date     = Pasarport Geçerlilik Tarihi       -
     * --------------------------------------------------------------
     * citizenship_number       = Vatandaşlık Numarası
     *
     * [ Kurumsal Bilgiler ] Kurumsal hesap zorunlu bilgiler
     *
     * corporate_type = ["corporate_type_a", "corporate_type_b", "corporate_type_c", "corporate_type_d", "corporate_type_e", "corporate_type_f", "corporate_type_g"]
     * --------------------------------------------------------------
     * "corporate_type_a"              => "Şahıs İşletmesi",        -
     * "corporate_type_b"              => "Anonim İşletme",         -
     * "corporate_type_c"              => "Limited İşletme",        -
     * "corporate_type_d"              => "Kollektif İşletme",      -
     * "corporate_type_e"              => "Komandit İşletme",       -
     * "corporate_type_f"              => "Kooperatif İşletme",     -
     * "corporate_type_g"              => "Dernek İşletme",         -
     * --------------------------------------------------------------
     *
     * corporate_title              = İşletme Başlığı
     * corporate_id                 = "Vergi Numarası
     * corporate_administration     = Vergi Dairesi
     * corporate_phone              = İşletme Telefon
     * corporate_fax                = İşletme Faks
     * corporate_email              = İşletme Mail
     * corporate_start_date         = İşletme Kurul Tarihi
     * corporate_owner_holder       = İşletme Yetkilisi İsim Soyisim
     * corporate_owner_number       = İşletme Yetkisili Telefon Numarası
     * corporate_owner_email        = İşletme Yetkilisi E-Posta Adresi
     * corporate_country            = İşletme Ğlke
     * corporate_city               = İşletme Şehir
     * corporate_district           = İşletme İlçe
     * corporate_postcode           = İşletme Posta Kodu
     * corporate_address            = İşletme Adresi
     *
     *
     */
    public static function createCustomer($Config, $developerToken, $companyAccessToken, $data = []) {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('POST', sprintf('/api/v1/app/access/company/customer/create?initial=%s',$companyAccessToken));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerToken)
            ],
            'form_params' => $data
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function companies($Config, $developerToken) {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/companies'));

        $response =  $client->send($request, [
            'headers' => [
                
                
                'Authorization' => sprintf('Bearer %s',$developerToken)
            ],
            'form_params' => []
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function customers($Config, $developerToken) {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/customers'));

        $response =  $client->send($request, [
            'headers' => [


                'Authorization' => sprintf('Bearer %s',$developerToken)
            ],
            'form_params' => []
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }
    public static function customersPagination($Config, $developerToken,$page = 1, $pageSize = 100) {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/customers/pagination?page=%s&pageSize=%s',$page,$pageSize));

        $response =  $client->send($request, [
            'headers' => [


                'Authorization' => sprintf('Bearer %s',$developerToken)
            ],
            'form_params' => []
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function employeries($Config, $developerToken) {

        $client     = new Client(["base_uri" => $Config->apiServer]);
        $request    = new Request('GET', sprintf('/api/v1/app/employers'));

        $response =  $client->send($request, [
            'headers' => [


                'Authorization' => sprintf('Bearer %s',$developerToken)
            ],
            'form_params' => []
        ]);

        $responseCheck = json_decode($response->getBody());

        return $responseCheck;

    }

    public static function company($Config, $developerToken,$companyIDorIDS,$multiple = false) {

        $client     = new Client(["base_uri" => $Config->apiServer]);


        if(is_array($companyIDorIDS) && $multiple):

            $promises   = [];
            $export     = [];
            
            foreach ($companyIDorIDS as $key => $ID):

                $promises[$key] =  $client->getAsync( sprintf('/api/v1/app/company/%s',$ID), [

                    'headers' => [
                        

                        'Authorization' => sprintf('Bearer %s',$developerToken)
                    ],
                    'form_params' => []
                ]);

            endforeach;

            $responses = Promise\Utils::unwrap($promises);

            foreach ($responses as $key => $respons):

                $export[$key] = json_decode($respons->getBody());

            endforeach;

            return $export;

        else:

            $request    = new Request('GET', sprintf('/api/v1/app/company/%s',$companyIDorIDS));

            $response =  $client->send($request, [
                'headers' => [
                    
                    
                    'Authorization' => sprintf('Bearer %s',$developerToken)
                ],
                'form_params' => []
            ]);

            $responseCheck = json_decode($response->getBody());

            return $responseCheck;

        endif;


    }

}