📌 Alcaldía Facatativá - Sistema de Gestión

Aplicación web desarrollada en PHP para la gestión de proyectos, usuarios y reportes estadísticos de la Alcaldía de Facatativá.
El sistema permite administrar proyectos, generar reportes en Excel y PDF, y visualizar estadísticas mediante gráficos.

📁 Estructura del Proyecto

```
AlcaldiaFacatativa/
│
├── index.php                   # Página principal del sistema
├── index.html                  # Página alternativa/inicial
├── default.css                 # Estilos principales
│
├── consultaUsuarioAdmi.php      # Consulta de usuarios (administrador)
├── consulta_usuario.php         # Consulta de usuarios general
├── crear_proyecto_admi.php      # Crear proyecto (administrador)
├── nuevo_proyecto.php           # Registro de nuevo proyecto
├── crearusuAdmi.php             # Crear usuario administrador
├── crearusuperadmi.php          # Crear usuario superadministrador
├── inscribirusuarios.php        # Inscripción de usuarios
│
├── menu.php                     # Menú principal
├── menuAdmi.php                 # Menú administrador
│
├── seguridad.php                # Módulo de seguridad
├── seguridad_accion.php         # Acciones de seguridad
├── recuperar.php                # Recuperar credenciales
├── recuperar_contrasena.php     # Recuperación de contraseña
├── recuperar_modifica.php       # Modificación en recuperación
│
├── logica_proyecto.php          # Lógica de proyectos (usuario)
├── logica_proyecto_admi.php     # Lógica de proyectos (admin)
├── logicaModiUsua.php           # Modificación de usuario (general)
├── logicaModiUsua_admi.php      # Modificación de usuario (admin)
├── logicaModiUsua_per.php       # Modificación de usuario (personal)
├── logicaincribir.php           # Inscripción lógica de usuarios
├── logicaingreseadmin.php       # Ingreso administrador
│
├── lista_proyectos.php          # Listado de proyectos
├── lista_proyectos_admi.php     # Listado de proyectos administrador
├── lista_proyectos_pro_admi.php # Listado proyectos por administrador
├── lista_personas_general.php   # Listado de personas
├── listas_graficas_filtradas.php# Gráficas filtradas
│
├── excel.php                    # Reporte general en Excel
├── excel_curso.php              # Reporte de cursos en Excel
├── excel_general.php            # Reporte generalizado en Excel
├── excel_seguridad.php          # Reporte de seguridad en Excel
├── exel_ejecutados.php          # Reporte de ejecutados en Excel
│
├── pdf.php                      # Reporte en PDF
├── pdf_curso.php                # PDF de cursos
├── pdf_ejecutado.php            # PDF de proyectos ejecutados
├── pdf_general.php              # PDF general
├── pdfpruebacerti.php           # Prueba de certificado en PDF
├── pruebapdf.php                # Test de PDF
│
├── graficas.php                 # Página de gráficas
├── graficas_proyecto.php        # Gráficas de proyectos
├── grafica_riesgo.php           # Gráficas de riesgo
├── grafica_madre.php            # Gráfica de madres
├── grafica_despla.php           # Gráfica de desplazados
├── grafica_todo.php             # Gráfica general
│
├── proyectoscurso.php           # Listado de proyectos en curso
├── proyectosejecutados.php      # Listado de proyectos ejecutados
│
├── fpdf.php                     # Librería FPDF
├── PHPExcel.php                 # Librería PHPExcel
│
├── MANUAL.pdf                   # Manual general del sistema
├── manualadministrador.pdf      # Manual del administrador
├── manualinicial.pdf            # Manual del usuario inicial
│
└── exit.php                     # Cierre de sesión
```

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
