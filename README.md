# so-parcial-2

Para resolver este parcial, se debe tener una máquina virtual con CentOS Stream 9 nueva. Debe resolverse usando el usuario `root`.

## Consigna

1. Iniciar la máquina virtual y usar un adaptador de red puente con una configuración manual que debe incluir:

    - Una dirección IP apropiada
    - Gateway
    - Máscara de Subred
    - Servidor DNS

2. Habilitar el uso de SSH con el usuario `root` desde el exterior y acceder a la máquina virtual desde un cliente SSH.

3. Instalar `Apache`, `MySQL`, `Git`, `php` y `php-mysqli`.

4. Clonar este repositorio a la máquina virtual.

5. Copiar el contenido del repositorio clonado en el directorio desde donde se lanza Apache.

6. Configurar una base de datos en SQL que tenga lo siguiente:

    - El nombre de la base de datos debe llamarse `davinci`.
    - Crear una tabla `alumnos` con los siguientes datos:

<table>
    <thead>
        <tr>
            <th colspan=4 style="text-align:center">alumnos</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Matricula</th>
            <th>Carrera</th>
            <th>Fecha de nacimiento</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Gonzalo Gonzalez</td>
            <td>1234</td>
            <td>Diseño Web</td>
            <td>1990-02-12</td>
        </tr>
        <tr>
            <td>Martin Martinez</td>
            <td>4321</td>
            <td>Analista de Sistemas</td>
            <td>2000-09-16</td>
        </tr>
        <tr>
            <td>Laura Pereyra</td>
            <td>1111</td>
            <td>Diseño Multemedial</td>
            <td>2000-12-09</td>
        </tr>
    </tbody>
</table>

7. Crear un usuario para MySQL que tenga acceso desde cualquier dirección y otorgarle privilegios en todas las tablas, por ejemplo:

```sql
CREATE USER 'admin'@'%' IDENTIFIED BY 'P@ssw0rd123!';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

8. Habilitar el acceso a la base de datos desde Apache con:

```bash
setsebool -P httpd_can_network_connect_db 1
```

9. Habilitar el tráfico de datos para el servicio de Apache a través del firewall.

10. Modificar en el archivo `php/api.php` las lineas correspondientes a las credenciales de la base de datos para poder acceder con el usuario que creamos.

11. Modificar el `index.html` para agregar los datos del que resuelve el parcial en el `h1`.

12. Verificar el funcionamiento del servidor accediendo desde un navegador a la página hosteada por la máquina virtual.

## Capturas

Todas las capturas deben ser de la pantalla completa, mostrando cada uno de los ítems mencionados abajo. Deben sacarse una vez resuelto el parcial y desde el cliente de SSH.

1. Mostrar el contenido del archivo /etc/NetworkManager/system-connections/[interfaz].nmconnection.

2. Mostrar el resultado del comando `ip addr`.

3. Mostrar el resultado de `systemctl status httpd`.

4. Mostrar el resultado de `systemctl status mysqld`.

5. Mostrar el resultado de `cat ~/.mysql_history`.

6. Mostrar el resultado de `ls /var/www/html`.

7. Mostrar el resultado de `cat /var/www/html/php/api.php`.

8. Mostrar el resultado de acceder desde un navegador a la página hosteada por el servidor Apache.

## Entrega

Subir al espacio habilitado un archivo comprimido con todas las capturas de los ítems anteriores.

## Aclaraciones adicionales

- El parcial debe resolverse exclusivamente desde un cliente de SSH una vez habilitado.
- El uso de alguna herramienta como Webmin para gestionar los distintos servicios resultará en solo la aprobación del parcial.