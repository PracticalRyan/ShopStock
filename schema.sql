CREATE DATABASE IF NOT EXISTS shopstock;
USE shopstock;

CREATE TABLE IF NOT EXISTS products (
    code INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    cost INT NOT NULL DEFAULT 0,
    price INT NOT NULL DEFAULT 0,
    bought_amount INT NOT NULL DEFAULT 0,
    bought_cost INT NOT NULL DEFAULT 0,
    sold_amount INT NOT NULL DEFAULT 0,
    sold_revenue INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS point_of_sale (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_code INT NOT NULL,
    amount INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_point_of_sale_product
        FOREIGN KEY (product_code) REFERENCES products(code)
        ON DELETE CASCADE
);
