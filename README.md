<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# empleateya-lms
Configuración

## Instalar XAMPP:
https://www.apachefriends.org/es/index.html

## Instalar Composer
* Abrir GitBash
* Ir a la carpeta cd c://xamp/htdocs
* Ejecutar el comando: composer global require laravel/installer

## Crear un dominio local para nuestro proyecto:
* Abrir bloc de notas como administrador
* Archivo -> abrir 
* ubicar la ruta C:\Windows\System32\drivers\etc
* Seleccionar la opcion All Files(*.*)
* Seleccionar el archivo: hosts
* Añadir el dominio local:
	127.0.0.1		empleateya-lms.test
* Guardar
* Indicarle a Apache que proyecto abrir al ingresar a ese dominio dirigiendose a la ruta 
	C:\xampp\apache\conf\extra
* Abrir con el bloc de notas el archivo httpd-vhosts.conf
* Añadir esta linea: (puedes ver el articulo en https://codersfree.com/blog/como-generar-un-dominio-local-en-windows-xampp)
	NameVirtualHost *
	<VirtualHost *>
		DocumentRoot "C:\xampp\htdocs"
		ServerName localhost
	</VirtualHost>
* Luego debajo añadimos este: 
	<VirtualHost *>
		DocumentRoot "C:\xampp\htdocs\empleateya-lms\public"
		ServerName empleateya-lms.test
		<Directory "C:\xampp\htdocs\empleateya-lms\public ">
			Options All
			AllowOverride All
			Require all granted
		</Directory>
	</VirtualHost>

## Cargar las dependencias de Laravel:
* Abrir la la terminal en VSCODE (CTRL + ñ) en la ruta del proyecto
* Ejecutar el comando: 
composer install

## Cargar las dependendencias de NodeJS:
* Abrir la la terminal en VSCODE (CTRL + ñ) en la ruta del proyecto
* Ejecutar el comando: 
npm install

## Configurar la conexion a la base de datos
* Creamos una base de datos: empleateya_lms
* Copiamos el archivo .env.example y lo renombramos como: .env 
* Dentro del archivo .env, cambiar la APP_URL por la URL del proyecto 
* DB_DATABASE = mysql
* Generar la APP_KEY ejecutando el comando: php artisan key:generate
* Ir al servidor local, y en la carpeta public generar el acceso directo a la carpeta storage :
	php artisan storage:link
  
## Ejecutar las migraciones:
* php artisan migrate:fresh --seed 
