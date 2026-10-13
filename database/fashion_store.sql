CREATE DATABASE IF NOT EXISTS fashion_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fashion_store;
CREATE TABLE IF NOT EXISTS products (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL, category VARCHAR(50) NOT NULL, description TEXT NOT NULL, price DECIMAL(12,2) NOT NULL, stock INT NOT NULL DEFAULT 0, image VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE IF NOT EXISTS orders (id INT AUTO_INCREMENT PRIMARY KEY, customer_name VARCHAR(120) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(30) NOT NULL, address TEXT NOT NULL, total DECIMAL(12,2) NOT NULL, status VARCHAR(30) NOT NULL DEFAULT 'Menunggu', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE IF NOT EXISTS order_items (id INT AUTO_INCREMENT PRIMARY KEY, order_id INT NOT NULL, product_id INT NOT NULL, product_name VARCHAR(150) NOT NULL, price DECIMAL(12,2) NOT NULL, quantity INT NOT NULL, FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE CASCADE);
INSERT INTO products (name,category,description,price,stock,image) VALUES
('Essential Oversized Tee','Pria','Kaos oversized nyaman untuk aktivitas harian.',129000,30,'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=800'),
('Classic White Shirt','Pria','Kemeja putih minimalis dengan potongan modern.',219000,20,'https://images.unsplash.com/photo-1598032895397-b9472444bf93?w=800'),
('Urban Hoodie','Pria','Hoodie hangat dan kasual.',289000,15,'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=800'),
('Soft Knit Cardigan','Wanita','Cardigan rajut lembut untuk gaya santai.',249000,18,'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=800'),
('Everyday Denim','Wanita','Denim serbaguna untuk tampilan kasual.',279000,24,'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=800'),
('Neutral Basic Tee','Unisex','Kaos basic netral yang mudah dipadukan.',119000,40,'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=800');
