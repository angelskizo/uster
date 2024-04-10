El gestor de vehiculos y conductores Uster es una aplicación creada con Symfony. No he podido terminar la aplicación en su totalidad pero hasta su estado actual es hasta donde he podido llegar y vamos a ver ahora como está y que le faltaría por desarrollar.

INDICE

1-Características Técnicas

2-Instalación y ejecución

3-Página Principal

4-Páginas Segundarias

5-Observaciones Finales


1-Características Técnicas
El software esta realizado en local con Symfony, usa BBDD MySQL y lleva bootstrap para que la parte visual se vea decente.


2-Instalación y ejecución

Paja instalar y ejecutar el proyecto he usado el servidor apache y las bases de datos MySQL con XAMPP. Para hacer funcionar la app debemos ir al PHPMyAdmin de XAMPP introducir las siguientes consultas en la consola para tener preparada la base de datos de la aplicación:

create database uster;
use uster;
create table vehicles ( id int auto_increment, brand varchar(50), model varchar(50), plate varchar(20), license_required varchar(1), PRIMARY KEY(id));
create table drivers (id int AUTO_INCREMENT, name varchar(50), surname varchar(50), license varchar(1), primary key(id));
create table trip (id int AUTO_INCREMENT, vehicle int, driver int, `date` date, primary key(id), FOREIGN KEY(vehicle) REFERENCES vehicles(id) on delete cascade, FOREIGN KEY(driver) references drivers(id) on delete cascade);

Una vez creada la base de datos debemos montar el directorio "public" en localhost para acceder con la dirección tipo localhost. La página principal de la app está en el path /home en este caso en localhost/home.


3-Estructura interna y de archivos

Entidades
La aplicación tiene en la ruta carpetaproyecto/src/Entity los archivos de las 3 clases principales de la app: Drivers, Vehicles y Trip.
Controladores
En carpetaproyecto/src/Controller podemos ver todos los controladores donde llamamos a las vistas, hacemos las consultas a BBDD y demás funciones.
Formularios
Los formularios usados en la aplicación estan en la ruta carpetaproyecto/src/Form, tienen nombres descriptivos y se puede ver como son llamados en la función de edit y de new en cada controlador de cada entidad.
Vistas
En carpetaproyecto/templates podremos encontrar las vistas de cada controlador de la App respectivamente además de la vista de la página principal(home). Las vistas de las entidades incluyen un archivo que muestra el listado y otro que llama al formulario para añadir/editar elementos.
Rutas
Por último está en carpetaproyecto/config/routes.yaml el archivo donde asignamos las rutas de la web al controlador correspondiente.


4-Pagina Principal

Es el menú principal de la web, no tiene funcionalidades, simplemente en él podras ver el menú de la web con Vehicles, Drivers y Trip. También incluye un mensaje de bienvenida.

Pulsando los botones del menú nos desplazaramos a las páginas segundarias de la app que es donde está la información.


5-Páginas Segundarias
Las 3 vistas segundarias donde está la información son prácticamente idénticas, en ellas veremos un listado tanto de vehículos como de conductores o trayectos respectivamente. Tenemos un enlace "Add New" para añadir una fila de contenido que nos llevara a su respectivo formulario donde escribiremos los datos que queremos guardar y seremos enviados a la vista de tabla donde podremos ver la información introducida ya en la tabla.
Cada elemento de las tablas tendrá 2 enlaces "Edit" y "Delete" para editar la fila o eliminarla respectivamente. La edición funciona practicamente igual que añadir un dato, de hecho es el mismo formulario solo que se encarga de editar.


6-Conclusiones Finales
He querido hacer el proyecto en Symfony esperando que valoreis el intento usando la tecnología que os gusta más. Se que haciendolo con PHP puro podría haber cumplido todos los requerimientos pero también habría tardado mucho más y no quería tardar demasiado en realizar la prueba. Aun quedan por hacer unas cuantas tareas para cumplir mejor los requerimientos de la App, entre ellas serian:
    a-La gestión al añadir un trayecto (o Trip) con los pasos y la comparación por fechas, conductores y licencias.
    b-Un script de validación que te muestra una pregunta si estas seguro de editar/crear/eliminar antes de que los formularios hagan submit.







