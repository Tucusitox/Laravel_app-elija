PASOS PARA INICIALIZAR EL MÓDULO AL MOMENTO DE PRESENTARLO (LEER TODOS LOS PASOS):

PASO N1 ---------------------------------------------------------

Abre el XAMPP y activa los Serrvicios apache y mysql.

Despúes configure su nuevo archivo ".env" correctamente en el puerto 3306 
y el nombre de la base de datos que es "modulo_supervision" con el gestor "Mysql".

Para enviar correos debe agregar al .env tu credenciales de servidor de correo
o datos de una cuenta con clave de aplicacion. 

En el archivo .env el SESSION_DRIVER debe estar en "database", así: "SESSION_DRIVER=database".

PASO N2 ---------------------------------------------------------

Entra a phpMyAdmin y crea una nueva base de datos con el nombre "app_elija".

PASO N3 ----------------------------------------------------------

Con el proyecto ya en vscode desde la terminal aplica el comando "php artisan migrate". Depúes de aplicarlo revisa el phpMyAdmin para ver si se crearon las tablas correctamente.

PASO N4 -----------------------------------------------------------

En la terminal aplica el comando "php artisan db:seed --class=AppSeeder" para insertar datos de prueba y así poder visualizar el funcionamiento del sistema.

PASO N5 ---------------------------------------------------------------

Instalar los siguientes paquetes:
Primero: npm install puppeteer
Segundo: composer require spatie/browsershot

PASO N6 ---------------------------------------------------------------

Aplica el comando "composer run dev" para inciar el proyecto y visualizarlo en un servidor local dentro de un buscador.

NOTA --------------------------------------------------------------------

Si al momento de levantar el servidor existe un error de depencias aplica estos comandos "php artisan config:clear" y despúes "composer install". Si esto no funciona busca información en internet sobre el error y como solucioanrlo.
