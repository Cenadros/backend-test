# Backend Developer Test

## Requisitos
* Docker: https://docs.docker.com/engine/install/
* Docker compose: https://docs.docker.com/compose/install/

## Como empezar
Para la resolución de este problema se ha optado por dockerizar la aplicación de tal manera que se puedan utilizar todas
las herramientas necesarias.

Se ha incluido un `Dockerfile` y un `docker-compose.yml` con la información de la imagen. En esta imagen de `php7-4` se
incluye tanto `composer` como `php-cs-fixer` y se ubica el proyecto dentro del directorio `var/www` del container.

Para comenzar, desde la raiz del proyecto en una terminal lanzaremos:

```sh
docker-compose up -d
```

Este comando construirá la imagen a partir del Dockerfile. Una vez generada la imagen ya podremos acceder al container
utilizando los scripts incluidos:

```sh
./php.73
```

O en caso de necesitar entrar como root:
```sh
./phpRoot.73
```

Dentro de este container tendremos accesos a toda la funcionalidad de php. Para facilitar el trabajo se han incluido
los siguientes scripts a lanzar dentro del container:

* `composer test`: Este comando lanza phpUnit para comprobar los test unitarios.
* `composer psalm`: Este comando ejecuta psalm.
* `composer phpstan`: Este comando ejecuta phpstan

Además, como se mencionó antes, se ha incluido la herramienta `php-cs-fixer` la cual podemos ejecutar desde la propia
raiz del proyecto fuera del container con el script auxiliar:
```sh
./phpCsFix
```

La configuración que he seguido para el `php-cs-fix` se incluye en el fichero `.php_cs` del proyecto.

