
--Reto Técnico - Backend developer

El reto consiste en utilizar el framework Laravel para replicar la funcionalidad de esta api
(https://jobs.backbonesystems.io/api/zip-codes/01210), utilizando esta fuente de información.
El tiempo de respuesta promedio debe ser menor a 300 ms, pero entre menor sea, mejor.

-- Desarrollo

Proyecto con Laravel versión 8.

-- 1) Se definieron y crearon modelos.
-- 2) importar el archivo en formato Excel lo cual pase a cvs para exportarlo directamente a la base de datos con la informacion unicamente de Chiapas, por cuestiones de prueba.
https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx.
-- 3) Se habilito y replico la estructura de la ruta ... /api/zip-codes/{zip_code}.
-- 4) Se realizaron las pruebas necesarias para obtener las misma estructura json requerida.

Comentarios

Un reto sencillo pero con sus criterios de evaluacion. 
