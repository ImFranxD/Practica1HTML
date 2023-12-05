***IMPORTACIÓN DE LIBRERIAS DE MANERA LOCAL***

PROS:

1. Control de versiones: Al tener la libreria descargada de manera local puedes utilizar una versión concreta de esa libreria, esto nos puede ayudar a poder garantizar la estabilidad y compatibilidad con nuestra página.

2. Desempeño: Tener los archivos de manera local hace que los tiempos de carga sean reducidos al no depender de la velocidad de conexión con un servidor externo.

3. Acceso sin conexion: Si por alguna razón alguna vez no dispones de conexión a internet y tu aplicación funciona sin ella podras utilizar las librerias al tenerlas descargadas de manera local.

CONTRAS:

1. Actualizaciones manuales: En caso de que queramos tener las librerias actualizadas en la ultima versión deberemos estar atentos continuamente a nuevas versiones que vayan saliendo.

2. Espacio de almacenamiento: Descargar todas las librerias de manera local hace que nuestro repositorio vaya aumetando su peso.

***IMPORTACIÓN DE LIBRERIAS CON UN CDN***

PROS: 

1. Implementación rapida: Se puede empezar a utilizar rapidamente una biblioteca al enlazarla desde un CDN sin tener que descargarla o gestionarla localmente.

2. Actualizaciones automáticas: Al poder importarlas de un CDN, nuestra libreria se actualizara automaticamente sin necesidad de que nos preocupemos sobre la version.

3. Menor carga para el servidor: Al importar librerias desde un CDN se puede reducir la carga en nuestro servidor.

CONTRAS:

1. Dependencia externa: En caso de que el CDN tenga problemas de conexión nuestra aplicación puede verse afectada.
 
2. Menor control de versiones: Al no tener control sobre las versiones esto se puede volver en tu contra haciendo que tengas problemas de compatibilidad.

3. Vulnerabilidad en la seguridad: Dependiendo de que CDN se utilize, puede haber problemas con la seguridad y de que tambien entre codigo malicioso con la biblioteca que queramos importar.