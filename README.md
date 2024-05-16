# Modulo de Noticias

## Descripción
Este proyecto del curso "Técnicas y Herramientas para el Desarrollo Web" y "Tópicos avanzados" se enfoca en desarrollar un sitio web de noticias para una empresa tecnológica, siguiendo una narrativa específica y cumpliendo con los requisitos establecidos.

## Estructura del Proyecto
El proyecto sigue el patrón de diseño Modelo-Vista-Controlador (MVC), lo que facilita la gestión de los componentes del sistema. Incluye migraciones, seeders, validaciones personalizadas y utiliza el ORM de CodeIgniter query builder.

## Herramientas y Tecnologías
Frontend: HTML, CSS, JavaScript
Backend: CodeIgniter
Patrón de Diseño: Modelo-Vista-Controlador (MVC)
La clase Session gestiona la información del usuario, como su rol e ID, útil para validaciones.
El modelo interactúa con la base de datos complementando la funcionalidad de la clase Session.
Consultas SQL y Backup

## La carpeta Database contiene el backup de la base de datos. Para usarlo:

Crear una base de datos llamada modulonoticias (utf8mb4_general_ci).
Puedes utilizar las migraciones en Database/Migrations y los seeders en Database/Seeds:
Ejecutar los siguientes comandos en la terminal:
php spark migrate
php spark db:seed UsuariosSeeder
php spark db:seed CategoriasSeeder
php spark db:seed NoticiasSeeder
php spark db:seed SeguimientosSeeder
php spark db:seed RespaldosSeeder
Para revertir las migraciones y eliminar las tablas, usa: php spark migrate:rollback

## Recordar

database.default.hostname = localhost
database.default.database = modulonoticias
database.default.username = root
database.default.password = 

dar los valores correspondientes al archivo .env o a database.php con los datos de su usuario y pw. Por defecto dejo esa configuración.

app.baseURL = 'http://localhost/moduloNoticias/' por si la necesitan

al clonar este repositorio se debe instalar las dependencias del proyecto con composer install

## Desafíos Superados
Se superaron desafíos en la planificación y desarrollo del respaldo y versiones de noticias, que condujeron a la implementación de las validaciones requeridas. Se utilizó una página única para editores y validadores, organizada en secciones con pestañas. Se implementó un evento para la publicación automática de noticias y se usaron popups/modales para mensajes de ayuda y formularios.

## Constantes y Mejoras Posibles
Se han introducido constantes para mejorar la legibilidad del código. Aunque siempre hay espacio para mejoras, este proyecto representa un aprendizaje continuo, especialmente en el uso de frameworks de desarrollo y backend.

## Cuentas para Probar el Sitio Web

### Usuario Validador:

Usuario: samus
Contraseña: samus123

### Usuario MultiRol:

Usuario: pedro
Contraseña: pedro123

## Usuarios Editores:

Usuario: lucho
Contraseña: Lucho123

Usuario: Alberto Gonzales
Contraseña: alberto3344

## Pantallas y consideraciones propias al realizar el proyecto

* Se tomó la decisión de colocar el botón de "Descartar" no solo en las noticias en estado de borrador, sino también en las noticias en proceso de validación y en las noticias rechazadas, con el objetivo de brindar mayor comodidad al usuario. Por ejemplo, si un editor se arrepiente de dejar una noticia en proceso de validación y desea descartarla, puede hacerlo directamente en lugar de tener que pasarla primero a estado de borrador y luego descartarla. En el caso de las noticias rechazadas, al ser consideradas un punto final en el ciclo de vida de la noticia, se permite al usuario descartarlas/eliminarlas de forma más sencilla. Esta funcionalidad evita la acumulación de noticias rechazadas y ofrece una manera más práctica de gestionar el contenido en el sistema.

## Usuarios

* `usuarios/new`: muestra el formulario de crear usuario.
	* `usuarios/create`: método que valida y crea un usuario, como también inicia sesión con el usuario creado y lo manda a la pantalla de `noticias/index`.
* `usuarios/index`: muestra el formulario de inicio de sesión de usuario.
	* `usuarios/login`: valida que el usuario exista e inicia la sesión para luego enviar al usuario a la pantalla de `noticias/index`.
* `usuarios/logOut`: si existe una sesión iniciada la cierra y envía al usuario a la pantalla de `noticias/index`.

## Noticias

### CRUD


* `noticias/index`: página de inicio de la empresa/Muestra las noticias publicadas totales.
* `noticias/show`: al seleccionarse una noticia muestra la misma de manera completa e individual. según el estado de la noticia debe tener botones que permitan realizar acciones como mandar a validar, corregir o editar, ver el seguimiento de la noticia que debería estar en todas.
* `noticias/new`: página formulario para crear una noticia.
	* `noticias/create`: método que trabaja la validación y creación de una noticia está le da un estado de borrador o lista para validar a partir de un `select o check box` o también puede descartarse si o si después de crearse la noticia y luego usado el método de `softdelete`.
* `noticias/edit`: página formulario de edición de una noticia.
	* `noticias/update`: método que trabaja la validación y edición de la noticia. debe hacer o actualizar la bitácora previo a la actualización y mantener el estado de borrador o pasar a lista para validar. debe hacer el seguimiento previo a la actualización de la noticia.
* `noticias/delete`: al seleccionar una noticia debe eliminar de manera que la noticia no se muestre en ningún lado de la app web pero se mantenga en la base de datos.

### Editor

* `noticias/home`: Es la página en que el usuario editor y el usuario con ambos roles puede encontrar todas sus noticias creadas separadas en las que están en borrador, las que están para corregir y las que están en estado de rechazo. también debe haber una parte para las que están en espera para validar y las publicadas propias.
	* `noticias/tracking`: al hacer clic en la noticias se dirige a la pantalla de seguimientos.
	* `editar`: en las noticias que estén en la sección de corrección se las mandara a editar.
	* `deshacer edición`: si la noticia ya fue editada al menos una vez podrá deshacer dicha edición en caso que la edición sea de una corrección deberá volver a estado de corrección.
	* `desactivar`: en la secciones de borrador o lista para validar si la noticia fue recién creada se podrá desactivar para usarse cuando el usuario decida activarla, para así no ocupar el lugar en el borrador o que no pueda ser validada por un validador.
	* `activar`: en caso de estar desactivada poder activar una noticia.
	* `estado`: cambiar de estado entre borrador y lista para validar.
	* `descartar`: puede descartar una noticia que este en borrador o en lista para validar y esta no tiene retorno.
* `noticias/tracking`: muestra los seguimientos hechos a una noticia posiblemente en `cards` individuales y que hacen uso de la tabla de respaldos para evidenciar los cambios en caso de que el seguimiento sea de modificación. aquí va a estar el `feedback` hecho en caso de corrección o rechazo. Solo va a tener un botón de volver al home del usuario.

### Validador

* `noticias/validate`: muestra una tabla con todas las noticias para validar y da las opciones de verla mejor con una modal, el botón de validar, el botón de rechazar (en caso de que en seguimientos el usuario validador no haya mandado a corregir previamente la noticia) y el botón de corregir.
	* `mostrar` : modal que muestra en profundidad la noticia.
	* `rechazar`: modal que muestra un formulario de rechazo y envía al método `noticias/rechazar`.
		* `noticias/rechazar`: método que valida el formulario y crea un seguimiento para el rechazo y luego modifica el estado de la noticia. 
	* `corregir`: modal que muestra un formulario de corrección y envía al método `noticias/corregir`.
		* `noticias/corregir`: método que valida el formulario y crea un seguimiento para el rechazo y luego modifica el estado de la noticia.
	* `publicar`: modal de confirmación que envía al método `noticias/publicar`.
		* `noticias/publicar`: método que debe crear la fecha de publicación y la fecha de expiración de la misma y crear un seguimiento que indique que fue publicada.
	* `historial`: tabla que contiene el historial de validaciones del usuario y que permite el deshacer la ultima acción realizada a cada noticia. El historial muestra la ultima modificación hecha por el usuario a cada noticia teniendo la posibilidad de acceder al historial completo de seguimientos de la noticia si así lo requiere.
	* `Noticias publicadas sin validar`: Muestra todas las noticias no propias que fueron publicadas automáticamente sin validarse para que el usuario validador pueda des publicar si así lo requiere.

## Narrativa del proyecto

Una empresa tecnológica ha encargado al área de desarrollo un módulo para editar y
publicar noticias referidas a la empresa. Los requerimientos mínimos de la aplicación son:
● Posibilidad de editar una noticia. La noticia tiene un título, descripción, fecha,
estado, categoría e imagen (opcional).
● El usuario editor puede crear o editar noticias propias. Luego puede guardarlas como
un borrador o como “lista para validar”. También podrá descartar o anular noticias
que estén en estado borrador, en este último caso las noticias quedarán en estado
“descartado”.
● El estado borrador permite que la noticia pueda volverse a editar en un tiempo
posterior. resultando en un nuevo borrador o en “lista para validación”.
● Un usuario validador puede publicar cualquier noticia lista para validar o marcarlas
como “para Corrección”. En ningún caso podrá ver las noticias que se encuentren en
borrador. Las noticias para corregir solo pueden ser editadas por los editores pasando
luego a borrador o “lista para validar”.
● El usuario validador también podrá rechazar una publicación que este en “lista para
validar” siempre y cuando sea la primera vez.
● La aplicación debe permitir llevar un seguimiento completo de los cambios de cada
una de las noticias pudiendo saber cuáles fueron las modificaciones, quienes y cuando
las hicieron.
● Las noticias estarán publicadas una cierta cantidad de días (parámetro a configurar
por la aplicación), luego el sistema las pasará a un estado “Finalizadas”.
● Si la noticia pasa más de 5 días en “lista para validar” el sistema las publicará
automáticamente. Solo en estos casos el usuario validador puede “despublicar” o
cambiar “para Corrección” la noticia (siempre y cuando no haya finalizado).
● Además, las noticias tienen un estado que permite describir si el registro de la noticia
está activo o no. Solo noticias recién creadas que estén en borrador o listas para
validar podrán ser desactivadas y activadas.
● Los usuarios editores no pueden tener más de 3 noticias activas en borrador.
● El sistema debe permitir todas las operaciones necesarias para gestionar las noticias,
incluyendo la posibilidad de deshacer la última operación realizada. (por ej. el usuario
editor podría dar marcha hacia atrás una publicación que registro como lista para
validar o por ejemplo un usuario validador podría deshacer una publicación que fue
publicada).
Se pide al alumno/grupo desarrollar el módulo con los siguientes requerimientos:
• Gestión de Noticias.
• Gestión de Usuarios.
Gestión de Usuarios
La gestión de los usuarios de la aplicación involucra el registro de los usuarios en la
aplicación ya sea como usuario editor y/o validador. Un usuario puede tener ambos roles.

Todas las características adicionales que pudieran formar parte de la aplicación, como así
reglas de negocio no definidas serán coordinadas y consensuadas con la cátedra.

Considere que las categorías son estáticas y ya se encuentran preestablecidas en la
aplicación.
Para implementar el proyecto el equipo de desarrollo deberá contar con herramientas de
desarrollo PHP que serán elegidas por el equipo.