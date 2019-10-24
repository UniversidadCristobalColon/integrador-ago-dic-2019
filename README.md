# Proyecto integrador agosto - diciembre 2019

## Requerimientos funcionales

1. Usuarios autenticados y con el rol definido podrán administrar el sistema.
2. El administrador podrá crear evaluaciones para un periodo de tiempo, personal a evaluar y personal evaluador.
3. El sistema deberá enviar (y reenviar) un e-mail al personal evaluador con las instrucciones para acceder a resolver su encuesta.
4. El sistema creará un formulario único para cada evaluador/encuesta.
5. 
7. 
7. Consulta del avance o estado de una encuesta o evaluación.
8. 

## Requerimientos no funcionales:

### Generales

1. Cada uno de los catálogos del sistema deberá contar con las funcionalidades de alta, bajas y cambios, cuidando siempre la intregridad referencial de los datos.
2. Permitir la configuración del texto que será enviado en cada email que envíe el sistema.
3. El usuario administrador podrá realizar la configuración o parametrización del servicio de envío de e-mail (SMTP)
4. La encuesta: 
   1. Contar con una fecha de caducidad.
   2. Mostrar en una o más páginas las preguntas a responder (paginación).
   3. Mostrar al respondiente el porcentaje o información sobre su avance.
   4. Validar que sean respondidas aquellas preguntas que sean obligatorias.
   5. Guardar las respuestas que el respondiente ha registrado.
   6. Permitir reanudar en otro momento al respondiente.
   7. Validar que solo se ha contestada una vez. 
   8. Permitir desactivarla/cancelarla para prevenir sea respondida.

### De interfaz de usuario

1. Contar una interfaz de usuario simple con un nivel de complejidad bajo el cual sea capaz de ser utilizado incluso por personas con poca experiencia en el uso de e-mail, redes sociales o portales de noticias.
2. Contar con la imagen (colores) y logotipo de la empresa.
3. Toda la interfaz del sistema deberá ser adaptativa en dispositivos móviles.
4. Cuidar la ortografía y redacción de los mensaje del sistema.
5. Mostrar mensajes de retroalmentación claros y concisos.
6. Mostrar mensajes como "No hay elementos" o "No hay información" en aquellas pantallas que no tengan información registrada.
7. Procurar la consistencia visual/gráfica en todas las pantallas del sistema, cuidando estilo de texto, tamaño de fuente, iconos, colores, fuentes, márgenes, etc.

### De seguridad y rendimiento

1. Solo usuarios autenticados y con el rol definido podrán administrar el sistema.
2. El acceso de los usuarios utilizando dirección de correo electrónico personal (único en todo el sistema) y contraseña.
3. Las contraseñas de los usuarios no se almacena en texto plano.
4. Mecanismos de cambio y/o recuperación de contraseña.
5. Las contraseñas de los usuarios deberá ser al menos de 6 caracteres de longitud.
6. Definir o limitar el acceso a las funcionalidades de usuarios de la administración a través de roles o perfiles.
7. Cada registro o actualización de información deberá ser acompañada del usuario, dirección ip, fecha, hora en la que sucedió el evento.
8. Manejo de la validez o caducidad de sesiones de usuario de la administración (principalmente).
9. Contar con mecanismos de seguridad que prevengan exposición indeseada de datos sensibles de personas o propios del negocio. Prevenir puertas traseras que permitan la manipulación de la información.
10. Mantener tiempos de respuesta del sistema menores a 1 segundo (no aplica en módulo de consultas)


1. Módulo de administración de catálogos:
   1. Usuarios del sistema   
   2. Empleados   
   3. Áreas
   4. Puestos
   5. Niveles
   6. Competencias
   7. Periodo de evaluación
2. Administración de evaluaciones:
   1. Banco de preguntas
   2. Definición de evaluación
   
