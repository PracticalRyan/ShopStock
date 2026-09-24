USE shopstock;

ALTER TABLE point_of_sale
    DROP FOREIGN KEY fk_point_of_sale_product;

ALTER TABLE products
    MODIFY code VARCHAR(32) NOT NULL;

ALTER TABLE point_of_sale
    MODIFY product_code VARCHAR(32) NOT NULL;

ALTER TABLE point_of_sale
    ADD CONSTRAINT fk_point_of_sale_product
        FOREIGN KEY (product_code) REFERENCES products(code)
        ON DELETE CASCADE;