CREATE TABLE ratings (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `car_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `rating` INT NOT NULL DEFAULT 0,
  FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `user_info`(`id`)
);