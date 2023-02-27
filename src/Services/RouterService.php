<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\AdminRest;
use Wisperp\ScrapperRouters\Api\AuthRest;
use Wisperp\ScrapperRouters\Models\WsrRoutersClient;

class RouterService
{
    protected $auth_api;

    protected $admin_api;

    protected $statusConnect = false;

    protected $errors = [];

    public function __construct()
    {
        $this->auth_api  = new AuthRest();        
        $this->admin_api = new AdminRest();        
    }

    // ================================================================
    // PUBLIC METHODS
    // ================================================================

    /**
     * Conectarse a un cliente
     * 
     * @param int $client_id ID del cliente
     */
    public function connect(int $client_id) : void {   
        $client = WsrRoutersClient::find($client_id);
        
        if(!$client){
            $this->errors = [
                "message" => "la ID del cliente no se encuentra en la base de datos"
            ];

            return;
        }

        $this->updateConfig($client);

        // Generar nuevo token si ya existe uno
        if($this->token()){
            $responseGenerate = $this->auth_api->generate_token();

            // Asignar el estado de la conexión como exitoso si el token se generó
            if($responseGenerate["code"] == 200){
                $this->statusConnect = true;
                return;
            }

            // Se procede a iniciar sesión si el token no se generó
        }

        $response = $this->signIn($client);
        $this->statusConnect = $response["code"] == 200;
        $this->errors        = $response["code"] == 200? [] : $response;
    }    
    
    /**
     * Obtener metadatos actuales del router
     * 
     * @param array $only Seleccionar propiedades especificas de la estructura de datos
     */
    public function metadata($only = []){   
        return $this->admin_api->metadata($only);
    }

    /**
     * Obtener el status de la conexión
     */
    public function status(){
        return $this->statusConnect;
    }

    /**
     * Obtener los errores obtenidos si aplica
     */
    public function errors(){
        return $this->errors;
    }

    /**
     * Obtener JWT
     */
    public function token(){
        return $this->auth_api->getToken();
    }

    /**
     * Obtener sesión actual
     */
    public function session(){
        return config("wsr.client");
    }

    // ================================================================
    // PRIVATE METHODS
    // ================================================================

    /**
     * Inicio de sesión
     * 
     * @param WsrRoutersClient $client
     */
    private function signIn(WsrRoutersClient $client){
        return $this->auth_api->signIn([
            "ip"       => $client->ip,
            "port"     => $client->port,
            "user"     => $client->user,
            "pass"     => $client->password,
            "interface_router_slug" => $client->interface->slug ?? ''
        ]);
    }

    /**
     * Actualizar configuración del cliente en tiempo de ejecución
     * 
     * @param WsrRoutersClient $client
     */
    private function updateConfig(WsrRoutersClient $client){
        config()->set("wsr.client", [
            "client_id"   => $client->id,
            "api_url"     => $client->scrapper->api_url,
            "description" => $client->scrapper->description,
            "shared_key"  => $client->scrapper->shared_key,
        ]);
    }
    
}
