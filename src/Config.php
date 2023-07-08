<?php


namespace WeIOT\PhpSdk;

interface ConfigInterface {

    public function setApiServer(string $apiServer): void;
    public function setDevID(string $devID): void;
    public function setAppID(string $appID): void;
    public function setDevToken(string $devToken): void;
    public function setDevKey(string $devKey): void;

    public function getApiServer(): string;
    public function getAppID(): string;
    public function getDevID(): string;
    public function getDevKey(): string;
    public function getDevToken(): string;

}

class Config  implements  ConfigInterface {


    public string $apiServer    = "https://dev.weiot.cloud";

    public string $appID        = "";

    public string $devID        = "";
    public string $devToken     = "";
    public string $devKey       = "";


    /**
     * @param string $apiServer
     */
    public function setApiServer(string $apiServer): void {
        $this->apiServer = $apiServer;
    }


    /**
     * @param string $devID
     */
    public function setDevID(string $devID): void{
        $this->devID = $devID;
    }

    /**
     * @param string $appID
     */
    public function setAppID(string $appID): void{
        $this->appID = $appID;
    }

    /**
     * @param string $devToken
     */
    public function setDevToken(string $devToken): void{
        $this->devToken = $devToken;
    }

    /**
     * @param string $devKey
     */
    public function setDevKey(string $devKey): void{
        $this->devKey = $devKey;
    }

    /**
     * @return string
     */
    public function getApiServer(): string{
        return $this->apiServer;
    }

    /**
     * @return string
     */
    public function getAppID(): string{
        return $this->appID;
    }

    /**
     * @return string
     */
    public function getDevID(): string{
        return $this->devID;
    }

    /**
     * @return string
     */
    public function getDevKey(): string{
        return $this->devKey;
    }

    /**
     * @return string
     */
    public function getDevToken(): string {
        return $this->devToken;
    }


}
