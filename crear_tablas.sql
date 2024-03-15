-- Ejecutar en phpMyAdmin > bdkickstar > SQL

CREATE TABLE IF NOT EXISTS `pedidos` (
    `id`             INT AUTO_INCREMENT PRIMARY KEY,
    `usuario_id`     INT NOT NULL DEFAULT 0,
    `nombre_cliente` VARCHAR(255) NOT NULL,
    `correo`         VARCHAR(255) NOT NULL,
    `telefono`       VARCHAR(20)  NOT NULL,
    `direccion`      TEXT         NOT NULL,
    `metodo_pago`    VARCHAR(50)  NOT NULL,
    `subtotal`       DECIMAL(10,2) NOT NULL,
    `envio`          DECIMAL(10,2) NOT NULL DEFAULT 0,
    `total`          DECIMAL(10,2) NOT NULL,
    `estado`         ENUM('pendiente','confirmado','enviado','entregado','cancelado') NOT NULL DEFAULT 'pendiente',
    `created_at`     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `pedido_detalles` (
    `id`              INT AUTO_INCREMENT PRIMARY KEY,
    `pedido_id`       INT NOT NULL,
    `producto_id`     INT NOT NULL,
    `nombre_producto` VARCHAR(255)  NOT NULL,
    `precio_unitario` DECIMAL(8,2)  NOT NULL,
    `cantidad`        INT           NOT NULL,
    FOREIGN KEY (`pedido_id`) REFERENCES `pedidos`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
