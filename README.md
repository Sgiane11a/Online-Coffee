# Online coffee

Online coffee

## Uso

Aquí se explica cómo instalar y configurar el proyecto de Laravel, junto con sus dependencias, para que puedas comenzar a trabajar sobre este.

### Requisitos Previos

Antes de comenzar con la instalación, asegúrate de tener instalados los siguientes requisitos previos en tu sistema:

-   PHP >= 8.2
-   Composer (para la gestión de dependencias de PHP)
-   PostgreSQL
-   Node.js y npm (para la gestión de paquetes de Node.js)

### Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. **Clona el Repositorio:**

    ```bash
    git clone https://github.com/tu_usuario/nombre_de_tu_fork.git
    ```

2. **Instala las Dependencias de PHP:**

    ```bash
    cd nombre_de_tu_fork
    composer install
    ```

3. **Configuración del Entorno:**

    - Copia el archivo `.env.example` y renómbralo como `.env`.

4. **Genera una Clave:**

    ```bash
    php artisan key:generate
    ```

5. **Ejecuta las Migraciones y los Seeders:**

    ```bash
    php artisan migrate --seed
    ```

6. **Crea el Storage para Guardar las Imágenes de los Usuarios:**

    ```bash
    php artisan storage:link
    ```

7. **Instala las Dependencias del Frontend:**
   Instala las dependencias de Node.js:

    ```bash
    npm install
    ```

8. **Compila los Assets:**

    ```bash
    npm run dev
    ```

9. **Servidor de Desarrollo:**
   Inicia el servidor de desarrollo de Laravel:
    ```bash
    php artisan serve
    ```

Ahora todo debería estar correctamente instalado y configurado en tu sistema. Puedes acceder a la aplicación desde tu navegador web en `http://127.0.0.1:8000`.
