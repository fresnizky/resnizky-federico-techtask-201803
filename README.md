# Description

This tech task was created using Docker containers (PHP-FPM and Nginx), but can be run on any server with PHP and a webserver installed.

## Running with Docker

### Install the local composer dependencies:
```
docker run --rm --interactive --tty --volume $PWD:/app composer instal
```
This will create a temporary container with the Composer binary and install dependencies added in composer.json

### Start the containers
```
docker-compose up
```

This will create two linked containers (PHP-FPM and Nginx) and expose port 80 on Nginx container.

If port 80 is already in use, modify docker-compose.yml to use a different port:
<pre>
ports:
    - <b>"8080:80"</b>
</pre>

### Access the webserver
Depending on your docker installation you can access the server on localhost, 127.0.0.1, docker or 192.168.99.100, etc.
```
http:\\[servername]:[port]/lunch
```