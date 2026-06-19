# La Casita - versión segura con tema oscuro

Proyecto de mini súper con vista pública, login por roles y paneles para cliente, empleado y administrador.

## Modos de uso

1. **Modo demo:** abre `index.html` directo en Google Chrome. El diseño, catálogo, carrito y paneles funcionan con datos locales del navegador.
2. **Modo MySQL:** abre el proyecto desde `http://localhost/LaCasita_secure_github/` usando XAMPP, WAMP o Laragon. En este modo los cambios se guardan en MySQL mediante PHP.

## Cuentas de prueba

| Rol | Correo | Contraseña |
|---|---|---|
| Administrador | admin@lacasita.com | 123456 |
| Empleado | empleado@lacasita.com | 123456 |
| Cliente | cliente@lacasita.com | 123456 |

El login abre el panel según el campo `rol` de la tabla `usuario`:

- `administrador`: panel completo.
- `empleado`: ventas, productos, inventario, clientes y proveedores.
- `cliente`: tienda, carrito, compras y perfil.

Si una cuenta está `Inactiva` o `Bloqueada`, no puede iniciar sesión.

## Cambios de esta versión

- FAQ corregidas para clientes de la tienda, sin preguntas técnicas sobre roles o base de datos.
- Sesión del navegador en `sessionStorage`, para que copiar la URL o abrirla en incógnito no abra una cuenta ya iniciada.
- Sesión de PHP con cookies `HttpOnly` para el modo MySQL.
- APIs privadas protegidas con validación de sesión.
- Consultas SQL con sentencias preparadas para evitar inyección SQL.
- Validación básica de correo, contraseña, textos, números y estados.
- Logout real con cierre de sesión de PHP y limpieza de la sesión del navegador.
- Tema oscuro en vista pública, login, registro y dashboard.
- Catálogo extendido de súper: bebidas, snacks, frutas, verduras, limpieza, hogar, abarrotes, lácteos, panadería, higiene y mascotas.
- Sucursales con latitud, longitud, mapa interactivo y botón “Cómo llegar”.
- Módulo de FAQ administrable.
- Módulos de categorías, promociones, proveedores, productos, clientes, empleados, inventario y ventas.

## Instalación local con MySQL

1. Copia la carpeta completa `LaCasita_secure_github` dentro de `htdocs`.
2. Abre XAMPP.
3. Activa **Apache** y **MySQL**.
4. Entra a `http://localhost/phpmyadmin/`.
5. Crea o importa la base de datos usando:

```txt
database/lacasita.sql
```

6. Revisa que exista la base de datos `lacasita`.
7. Abre el proyecto desde:

```txt
http://localhost/LaCasita_secure_github/
```

8. Prueba la conexión desde:

```txt
http://localhost/LaCasita_secure_github/php/probar_conexion.php
```

Si aparece `Conexión correcta`, el modo MySQL quedó listo.

## Archivo de conexión

La conexión está en:

```txt
php/conexion.php
```

Configuración por defecto para XAMPP:

```php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'lacasita';
```

## GitHub

Puedes subir todo el proyecto a GitHub como repositorio. Para publicarlo con GitHub Pages, la parte que se verá en línea será la parte estática: HTML, CSS y JavaScript.

GitHub Pages no ejecuta PHP ni MySQL. Por eso, en GitHub Pages se verá el modo demo. Para que la base de datos funcione en internet, se necesita un hosting con PHP y MySQL; GitHub queda como repositorio del código.

## Seguridad incluida

- `login_api.php` usa `password_verify()` y consulta preparada.
- `registro_api.php` usa `password_hash()` y consulta preparada.
- `data_api.php` exige sesión iniciada.
- `save_api.php` exige sesión iniciada y rol válido.
- `seguridad.php` centraliza validaciones y sesión de PHP.
- `logout_api.php` destruye la sesión de PHP.
- El frontend escapa texto con `LC.escapeHTML()` para reducir riesgo de inyección de HTML en la interfaz.

## Nota importante

MySQL/MariaDB es la base de datos. phpMyAdmin no es otra base de datos; solo es una herramienta para administrar MySQL desde el navegador.
