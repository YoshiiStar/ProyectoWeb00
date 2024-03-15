# Kickstart Footwear 👟

Tienda online de zapatillas Nike y Jordan con carrito de compras, métodos de pago integrados y gestión de pedidos.

## Estructura

```
proyectoavanceF/
├── kick.php               # Página principal (Home)
├── hombre.php             # Catálogo Hombre
├── mujeres.php            # Catálogo Mujer
├── sale.php               # Ofertas y descuentos
├── carrito.php            # Carrito de compras
├── pago.php               # Checkout / Métodos de pago
├── procesar_pago.php      # Procesamiento del pedido
├── pedido_confirmado.php  # Confirmación de pedido
├── mis_pedidos.php        # Historial de pedidos del usuario
├── detalle_pedido.php     # Detalle de un pedido
├── login.php              # Inicio de sesión
├── registrar.php          # Registro de usuario
├── productos_data.php     # Catálogo de productos (array PHP)
├── conexion.php           # Conexión a base de datos
├── culqi_config.php       # Llaves API Culqi (pago con tarjeta)
├── IMG/                   # Imágenes de productos y recursos
└── database/
    └── bdkickstar.sql     # Base de datos completa
```

## Funcionalidades

- Catálogo de productos por categoría (Hombre, Mujer, Sale)
- Carrito de compras con sesiones PHP (agregar, quitar, actualizar cantidad)
- Envío gratis en compras mayores a S/. 300
- Métodos de pago:
  - **Yape / Plin** — QR dinámico con monto exacto
  - **Contraentrega** — Pago al recibir el pedido
  - **Tarjeta** — Visa, Mastercard, Amex vía Culqi
- Registro e inicio de sesión de usuarios
- Historial de pedidos con estados (Pendiente → Confirmado → Enviado → Entregado)
- Diseño responsive para móvil y escritorio

## Tecnologías

- **Frontend:** HTML5, CSS3, JavaScript, Boxicons
- **Backend:** PHP 8 (sesiones, PDO/MySQLi)
- **Base de datos:** MySQL (XAMPP)
- **Pasarela de pago:** Culqi (Visa / Mastercard / Amex)
- **Servidor local:** Apache (XAMPP)

## Instalación

### Requisitos
- XAMPP (Apache + MySQL + PHP 8)

### Pasos

1. Clona el repositorio en tu carpeta `htdocs`:
```bash
git clone https://github.com/YoshiiStar/ProyectoWeb00.git kickstart
```

2. Importa la base de datos en phpMyAdmin:
   - Abre `http://localhost/phpmyadmin`
   - Crea una base de datos llamada `bdkickstar`
   - Importa el archivo `database/bdkickstar.sql`

3. Ejecuta las tablas de pedidos:
   - En phpMyAdmin, selecciona `bdkickstar` → pestaña SQL
   - Pega y ejecuta el contenido de `crear_tablas.sql`

4. Abre el proyecto en el navegador:
```
http://localhost/kickstart/kick.php
```

## Configuración de pago con tarjeta (Culqi)

Edita el archivo `culqi_config.php` con tus llaves API:

```php
define('CULQI_PUBLIC_KEY', 'pk_test_...');
define('CULQI_SECRET_KEY', 'sk_test_...');
```

Obtén tus llaves en [culqi.com](https://culqi.com) → Panel pruebas (DEVS) → API Keys.

### Tarjetas de prueba

| Campo       | Valor                  |
|-------------|------------------------|
| Número      | `4111 1111 1111 1111`  |
| Vencimiento | `09/25`                |
| CVV         | `123`                  |
