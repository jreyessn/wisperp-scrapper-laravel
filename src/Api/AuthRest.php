<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class AuthRest extends Rest
{

    private $prefix = "auth";

    /**
     * Iniciar sesión API
     * 
     * @param array $body credenciales
     */
    public function signIn(array $body){
        $client = new Client($this->configWithAuth());

        try {
            $response     = $client->post($this->prefix, [ 'json' => $body]);
            $responseJson = json_decode($response->getBody()->getContents(), true);
            
            $this->setToken($responseJson["access_token"]);

            return [
                "code"         => $response->getStatusCode(),
                "access_token" => $responseJson["access_token"]
            ];
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }

    /**
     * Generate Token
     * 
     * @param string token
     */
    public function generate_token(){
        $client = new Client($this->configWithToken());
        try {
            $response     = $client->get($this->prefix . "/generate");
            $responseJson = json_decode($response->getBody()->getContents(), true);

            $this->setToken($responseJson["access_token"]);

            return [
                "code"         => $response->getStatusCode(),
                "access_token" => $responseJson["access_token"]
            ];
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }



}
