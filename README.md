
# Wisperp Scrapper Laravel
  

Este paquete de Laravel proporciona una API sencilla para poder realizar la comunicación con el Scrapper para Routers.

  
## Instalación
  

Para instalar el paquete manualmente en la carpeta `packages` de tu proyecto, sigue los siguientes pasos:

1. Crea la carpeta `packages` en la raíz de tu proyecto Laravel si aún no la tienes.
2. En la carpeta `packages`, crea una nueva carpeta con el nombre del paquete. Debería llevar el siguiente nombre de carpetas `wisperp/scrapper-routers`.
3. Descarga el paquete y colócalo en la raíz de la carpeta que acabas de crear.
4. Agrega el siguiente código en la sección repositories de tu archivo composer.json.
```bash
"repositories": [
    {
        "type": "path",
        "url": "packages/wisperp/wisperp-scrapper-laravel"
    }
]
```
5 Ejecuta `composer install` en la raíz de tu proyecto
6 Agrega el siguiente proveedor de servicios a la matriz `providers` en el archivo `config/app.php` de tu proyecto Laravel:


```bash
'providers' => [ 
	\Wisperp\ScrapperRouters\WsrServiceProvider::class 
]
```

## Uso

  

En construcción.

  

## Contribución

  

Si encuentra algún problema o tiene alguna sugerencia, no dude en abrir un problema o enviar una solicitud de extracción..

  

## Licencia

  

Este paquete está licenciado bajo la Licencia MIT
