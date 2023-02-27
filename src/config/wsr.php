<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Credenciales del cliente actual
    |--------------------------------------------------------------------------
    |
    | Estas son las credenciales del cliente actual, que se pueden actualizar en tiempo de ejecución.
    |
    */
    "client"   => [
        "client_id" => null, // Identificador del cliente actual.

        "api_url" => null, // URL de la API del cliente actual.

        "description" => null, // Descripción del cliente actual.

        "shared_key" => null, // Clave compartida del cliente actual.
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de caché
    |--------------------------------------------------------------------------
    |
    | Este es el tiempo de caché del token en segundos que se utilizará para almacenar en caché la autenticación.
    |
    */
    "token_time" => 900,

    /*
    |--------------------------------------------------------------------------
    | Configuración de REST API
    |--------------------------------------------------------------------------
    |
    | Estas son las opciones de configuración para la conexión a través de la API REST.
    |
    */
    "rest_api" => [
        
        'cookies' => true, // Indica si se deben almacenar las cookies de la sesión.

        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', // Agente de usuario que se enviará con cada solicitud.

            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', // Tipo de contenido que se aceptará en la respuesta.

            'Accept-Language' => 'en-US,en;q=0.5', // Idiomas preferidos para la respuesta.

            'Connection' => 'keep-alive', // Establece la conexión persistente con el servidor.

            'Upgrade-Insecure-Requests' => '1' // Indica al servidor que la solicitud se realizará a través de una conexión segura.
        ]
    ]
];
