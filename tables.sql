-- User table
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20) NOT NULL
);

-- Recycle Partner table
CREATE TABLE IF NOT EXISTS `recycle_partners` (
  `partner_id` INT AUTO_INCREMENT PRIMARY KEY,
  `partner_name` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(255) NOT NULL
);

-- Recycle Request table
CREATE TABLE IF NOT EXISTS `recycle_requests` (
  `request_id` INT AUTO_INCREMENT PRIMARY KEY,
  `created_date` DATE NOT NULL,
  `user_id` INT NOT NULL,
  `recycle_partner_id` INT NOT NULL,
  `pickup_date` DATE,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  FOREIGN KEY (`recycle_partner_id`) REFERENCES `recycle_partners` (`partner_id`)
);