START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `pictures`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `sizes`;
DROP TABLE IF EXISTS `categories`;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `size_id` int,
  `category_id` int,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `price_state` decimal(10, 2),
  `couleur` varchar(200),
  `type_categorie` varchar(200) NOT NULL,
  `marque` varchar(200) NOT NULL,
  `state` varchar(10) NOT NULL,
  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`size_id`) REFERENCES `sizes`(`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

-- Insérer des données dans la table `categories`
INSERT INTO `categories` (`name`) VALUES
  ('Homme'),
  ('Femme'),
  ('Enfants');


-- Insérer des données dans la table `sizes`
INSERT INTO `sizes` (`name`) VALUES
  ('S'),
  ('M'),
  ('L'),
  ('XL'),
  ('XXL');


-- Insérer des données dans la table `products`
INSERT INTO `products` (`size_id`, `category_id`, `name`, `description`, `price`, `couleur`, `marque`, `state`) VALUES
  (1, 1, 'Product 1', 'Description for Product 1', 19.99, 'Red', 'Brand A', 1),
  (2, 2, 'Product 2', 'Description for Product 2', 29.99, 'Blue', 'Brand B', 1),
  -- Ajouter d'autres lignes de produits ici...
  (3, 3, 'Product 3', 'Description for Product 3', 49.99, 'Green', 'Brand C', 1);

 INSERT INTO `products` (`size_id`, `category_id`, `name`, `description`, `price`, `price_state`, `couleur`, `type_categorie`, `marque`, `state`) VALUES
  (1, 1, 'Gucci T-Shirt', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 't-shirt', 'Gucci', 'standard'),
  (2, 1, 'Nike chemise', 'Iconic Air cushioned sneakers', 159.99, 59.50, 'White', 'chemise', 'Nike', 'solde'),
  (3, 1, 'Calvin Klein jeans pull', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 'pull', 'Calvin Klein', 'standard'),
  (4, 1, 'Sony Wireless Headphones pantalon', 'Noise-cancelling wireless headphones', 299.99, NULL, 'Black', 'pantalon', 'Sony', 'standard'),
  (5, 1, 'Adidas Sneakers chemise', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'chemise', 'Adidas', 'solde'),
  
  (1, 1, 'Gucci  pull', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 'pull', 'Gucci', 'standard'),
  (2, 1, 'Nike chemise', 'Iconic Air cushioned sneakers', 159.99, NULL, 'White', 'chemise', 'Nike', 'standard'),
  (3, 1, 'Calvin Klein Jeans short', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 'short', 'Calvin Klein', 'standard'),
  (4, 1, 'Sony Wireless Headphones chemise', 'Noise-cancelling wireless headphones', 299.99, 100.50, 'Black', 'chemise', 'Sony', 'solde'),
  (5, 1, 'Adidas Sneakers chemise', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'chemise', 'Adidas', 'solde'),
  
  (1, 1, 'Gucci T-Shirt', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 't-shirt', 'Gucci', 'standard'),
  (2, 1, 'Nike pull', 'Iconic Air cushioned sneakers', 159.99, 130.20, 'White', 'pull', 'Nike', 'solde'),
  (3, 1, 'Calvin Klein pull', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 'pull', 'Calvin Klein', 'standard'),
  (4, 1, 'Sony Wireless pull', 'Noise-cancelling wireless headphones', 299.99, 150.10, 'Black', 'pull', 'Sony', 'solde'),
  (5, 1, 'Adidas basket', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'basket', 'Adidas', 'solde'),
  
  (1, 2, 'Gucci pull', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 'pull', 'Gucci', 'standard'),
  (2, 2, 'Nike pantalon', 'Iconic Air cushioned sneakers', 159.99, 100.50, 'White', 'pantalon', 'Nike', 'solde'),
  (3, 2, 'Calvin Klein pantalon', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 'pantalon', 'Calvin Klein', 'standard'),
  (4, 2, 'Sony Wireless Headphones jupe', 'Noise-cancelling wireless headphones', 299.99, NULL, 'Black', 'jupe', 'Sony', 'standard'),
  (5, 2, 'Adidas Sneakers pull', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'pull', 'Adidas', 'solde'),
  
  (1, 2, 'Gucci robe', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 'robe', 'Gucci', 'standard'),
  (2, 2, 'Nike chemise', 'Iconic Air cushioned sneakers', 159.99, NULL, 'White', 'chemise', 'Nike', 'standard'),
  (3, 2, 'Calvin Klein robe', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 'robe', 'Calvin Klein', 'standard'),
  (4, 2, 'Sony Wireless Headphones chemise', 'Noise-cancelling wireless headphones', 299.99, 99.20, 'Black', 'chemise', 'Sony', 'solde'),
  (5, 2, 'Adidas Sneakers robe', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'robe', 'Adidas', 'solde'),
  
  (1, 2, 'Gucci T-Shirt robe', 'Classic logo-print T-shirt', 350.99, NULL, 'Black', 'robe', 'Gucci', 'standard'),
  (2, 2, 'Nike pull ', 'Iconic Air cushioned sneakers', 159.99, NULL, 'White', 'pull', 'Nike', 'standard'),
  
  (1, 3, 'Calvin Klein Jeans t-shirt', 'Slim-fit denim jeans', 120.50, NULL, 'Blue', 't-shirt', 'Calvin Klein', 'standard'),
  (2, 3, 'Sony Wireless Headphones short', 'Noise-cancelling wireless headphones', 299.99, 200.40, 'Black', 'short', 'Sony', 'solde'),
  (1, 3, 'Adidas Sneakers chemise', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'chemise', 'Adidas', 'solde'),
  (2, 3, 'Calvin Klein Jeans pull', 'Slim-fit denim jeans', 120.50, 100.29, 'Blue', 'pull', 'Calvin Klein', 'solde'),
  (1, 3, 'Sony Wireless Headphone robes', 'Noise-cancelling wireless headphones', 299.99, NULL, 'Black', 'robe', 'Sony', 'standard'),
  (2, 3, 'Adidas Sneakers basket', 'Classic low-top sneakers', 89.99, 69.99, 'Red', 'basket', 'Adidas', 'solde');

  INSERT INTO `pictures` (`link`, `title`, `product_id`) VALUES
  ('images/hommes/1.jpg', 'Gucci T-Shirt', 1),
  ('images/hommes/2.jpg', 'Gucci T-Shirt', 2),
  ('images/hommes/3.jpg', 'Gucci T-Shirt', 3),
  ('images/hommes/4.jpg', 'Gucci T-Shirt', 4),
  ('images/hommes/5.jpg', 'Gucci T-Shirt', 5),
  ('images/hommes/6.jpg', 'Gucci T-Shirt', 6),
  ('images/hommes/7.jpg', 'Gucci T-Shirt', 7),
  ('images/hommes/8.jpg', 'Gucci T-Shirt', 8),
  ('images/hommes/9.jpg', 'Gucci T-Shirt', 9),
  ('images/hommes/10.jpg', 'Gucci T-Shirt', 10),
  ('images/hommes/11.jpg', 'Gucci T-Shirt', 11),
  ('images/hommes/12.jpg', 'Gucci T-Shirt', 12),
  ('images/hommes/13.jpg', 'Gucci T-Shirt', 13),
  ('images/hommes/14.jpg', 'Gucci T-Shirt', 14),
  ('images/hommes/15.jpg', 'Gucci T-Shirt', 15),
  ('images/femmes/1.jpg', 'Gucci T-Shirt', 16),
  ('images/femmes/2.jpg', 'Gucci T-Shirt', 17),
  ('images/femmes/3.jpg', 'Gucci T-Shirt', 18),
  ('images/femmes/4.jpg', 'Gucci T-Shirt', 19),
  ('images/femmes/5.jpg', 'Gucci T-Shirt', 20),
  ('images/femmes/6.jpg', 'Gucci T-Shirt', 21),
  ('images/femmes/7.jpg', 'Gucci T-Shirt', 22),
  ('images/femmes/8.jpg', 'Gucci T-Shirt', 23),
  ('images/femmes/9.jpg', 'Gucci T-Shirt', 24),
  ('images/femmes/10.jpg', 'Gucci T-Shirt', 25),
  ('images/femmes/11.jpg', 'Gucci T-Shirt', 26),
  ('images/femmes/12.jpg', 'Gucci T-Shirt', 27),
  ('images/enfants/1.jpg', 'Gucci T-Shirt', 28),
  ('images/enfants/2.jpg', 'Gucci T-Shirt', 29),
  ('images/enfants/3.jpg', 'Gucci T-Shirt', 30),
  ('images/enfants/4.jpg', 'Gucci T-Shirt', 31),
  ('images/enfants/5.jpg', 'Gucci T-Shirt', 32),
  ('images/enfants/6.jpg', 'Gucci T-Shirt', 33);
  
COMMIT;


