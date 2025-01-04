# Sistema de Tickets de Soporte Técnico

Este proyecto es un sistema de tickets de soporte técnico diseñado para optimizar la gestión de incidencias en una organización. Implementado con el patrón de diseño MVC, el sistema permite a los usuarios administrar tickets, realizar seguimiento y registrar comentarios.

## Estructura del Proyecto

La estructura del proyecto es la siguiente:

```
C:.
│   index.php            # Punto de entrada principal
│   readme.md            # Documentación del proyecto
│
├───BD
│       bd_script.sql    # Script SQL para inicializar la base de datos
│
├───config
│       database.php     # Configuración de conexión a la base de datos
│
├───controllers
│       ComentarioController.php  # Lógica para gestionar comentarios
│       TicketController.php      # Lógica para gestionar tickets
│       UsuarioController.php     # Lógica para gestionar usuarios
│
├───css
│       login-styles.css  # Estilos CSS para la página de inicio de sesión
│
├───img
│       logo.png          # Logo del sistema
│       tetsa_banner.mp4  # Video o banner promocional
│
├───js
│       (Vacío)           # Carpeta para scripts JavaScript personalizados
│
├───models
│       Comentario.php    # Modelo de datos para comentarios
│       model.php         # Clase base para modelos
│       Ticket.php        # Modelo de datos para tickets
│       Usuario.php       # Modelo de datos para usuarios
│
├───templates
│       footer.php        # Pie de página común para vistas
│       header.php        # Cabecera común para vistas generales
│       header_login.php  # Cabecera específica para el login
│
└───views
        create.php        # Vista para crear tickets
        dashboard.php     # Vista del panel de control
        login.php         # Vista de inicio de sesión
        registro.php      # Vista de registro de usuarios
        show.php          # Vista de detalles de un ticket
        ticket.php        # Vista de listado de tickets
```

## Requisitos

- Servidor web compatible con PHP (Apache o similar).
- PHP 7.4 o superior.
- Base de datos MySQL.
- Librerías adicionales:
  - Bootstrap
  - FontAwesome Icons
  - SweetAlerts
  - Charts.js (opcional para estadísticas).

## Instalación

1. Clona el repositorio en tu servidor local:
   ```bash
   git clone https://github.com/usuario/sistema-tickets.git
   ```

2. Configura la base de datos:
   - Importa el archivo `BD/bd_script.sql` en tu servidor MySQL.
   - Configura las credenciales de la base de datos en `config/database.php`.

3. Asegúrate de que las dependencias necesarias estén disponibles (Bootstrap, FontAwesome, etc.).

4. Abre el navegador y accede a `http://localhost/sistema-tickets` para comenzar.

## Funcionalidades

### Administrador
- Gestión de usuarios.
- Creación y asignación de tickets.
- Estadísticas y gráficas.

### Técnico
- Visualización de tickets asignados.
- Actualización del estado de los tickets.
- Comentarios sobre las incidencias.

## Tecnologías

- **Frontend**: HTML5, CSS3, Bootstrap, FontAwesome Icons.
- **Backend**: PHP 7.4+.
- **Base de datos**: MySQL.

## Contribución

Si deseas contribuir a este proyecto, crea un fork y realiza un pull request con tus cambios.

## Licencia

Este proyecto está bajo la licencia MIT. Puedes consultar el archivo `LICENSE` para más detalles.
