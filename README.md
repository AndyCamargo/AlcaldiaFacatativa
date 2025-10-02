📌 Alcaldía Facatativá - Sistema de Gestión

Aplicación web desarrollada en PHP para la gestión de proyectos, usuarios y reportes estadísticos de la Alcaldía de Facatativá.
El sistema permite administrar proyectos, generar reportes en Excel y PDF, y visualizar estadísticas mediante gráficos.

📂 Estructura del Proyecto

index.php → Página principal del sistema.

menu.php, menuAdmi.php → Interfaces de navegación para usuarios y administradores.

crear_proyecto_admi.php, nuevo_proyecto.php → Registro y administración de proyectos.

inscribirusuarios.php, crearusuAdmi.php → Módulos de inscripción y gestión de usuarios.

excel_*.php, pdf_*.php → Generación de reportes en Excel y PDF.

graficas_*.php → Módulos de generación de gráficos estadísticos.

manualadministrador.pdf, manualinicial.pdf → Documentación de uso para usuarios y administradores.

🚀 Requisitos

Servidor web con Apache/Nginx

PHP 7.x o superior

MySQL/MariaDB para la base de datos

Extensiones necesarias:

mysqli

gd (para gráficos)

mbstring

⚙️ Instalación

Clonar este repositorio:

git clone https://github.com/usuario/AlcaldiaFacatativa.git


Copiar los archivos en el directorio del servidor web (htdocs en XAMPP o /var/www/html en Linux).

Configurar la base de datos en los archivos de conexión PHP.

Acceder desde el navegador:

http://localhost/AlcaldiaFacatativa/

📊 Funcionalidades

✅ Registro y administración de usuarios (ciudadanos y administradores).

✅ Creación, modificación y seguimiento de proyectos.

✅ Generación de reportes en Excel y PDF.

✅ Visualización de gráficos estadísticos sobre los proyectos y beneficiarios.

✅ Recuperación y modificación de credenciales de usuario.

📖 Manuales

Manual del Administrador

Manual de Usuario Inicial

👨‍💻 Tecnologías Utilizadas

PHP

MySQL/MariaDB

PHPExcel para reportes en Excel

FPDF para reportes en PDF

HTML, CSS, JavaScript

📜 Licencia

Este proyecto es de uso interno de la Alcaldía de Facatativá.
