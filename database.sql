CREATE DATABASE handmade CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE handmade;

CREATE TABLE `users` (
  `userid` VARCHAR(30) NOT NULL PRIMARY KEY,
  `username` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `role` VARCHAR(10) DEFAULT 'user',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `tutorials` (
	`tutorialid` VARCHAR ( 30 ) NOT NULL PRIMARY KEY,
	`tutorialname` VARCHAR ( 255 ) NOT NULL,
	`video` VARCHAR ( 255 ) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `products` (
	`productid` VARCHAR ( 30 ) NOT NULL PRIMARY KEY,
	`image` VARCHAR ( 255 ) NOT NULL,
	`productname` VARCHAR ( 255 ) NOT NULL,
	`original_price` DECIMAL ( 10, 3 ) NOT NULL,
	`discount_percentage` INT NOT NULL,
	`discounted_price` DECIMAL ( 10, 3 ) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `favoritetutorials` (
	`favoriteid` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR ( 30 ) NOT NULL,
	`tutorialid` VARCHAR ( 30 ) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY ( `username` ) REFERENCES `users` ( `username` ) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY ( `tutorialid` ) REFERENCES `tutorials` ( `tutorialid` ) ON DELETE CASCADE ON UPDATE CASCADE 
);

CREATE TABLE `favoriteproducts` (
	`favoriteid` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR ( 30 ) NOT NULL,
	`productid` VARCHAR ( 30 ) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY ( `username` ) REFERENCES `users` ( `username` ) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY ( `productid` ) REFERENCES `products` ( `productid` ) ON DELETE CASCADE ON UPDATE CASCADE 
);

CREATE TABLE `usercart` (
  `cartid` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
	`productid` VARCHAR(30) NOT NULL,
	`quantity` INT NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY ( `username` ) REFERENCES `users` ( `username` ) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY ( `productid` ) REFERENCES `products` ( `productid` ) ON DELETE CASCADE ON UPDATE CASCADE 
);

-- Insert default admin user
INSERT INTO `users` (`userid`, `username`, `password`, `email`, `role`) VALUES ('1', 'admin', 'adminadmin', 'admin@gmail.com', 'admin');