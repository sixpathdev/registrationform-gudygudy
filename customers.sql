
CREATE TABLE `customers` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `gender` text NOT NULL,
  `marital_status` text NOT NULL,
  `state` text NOT NULL,
  `occupation` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
