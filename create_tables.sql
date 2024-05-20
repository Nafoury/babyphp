CREATE TABLE IF NOT EXISTS `user_authorization` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
);
CREATE TABLE IF NOT EXISTS `complete_info` (
  `info_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `baby_name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `baby_weight` double NOT NULL,
  `baby_height` double NOT NULL,
  `baby_head` double NOT NULL,
  `complete_info_user_authorization` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
   FOREIGN KEY (`complete_info_user_authorization`) REFERENCES `user_authorization`(`id`)
);
CREATE TABLE IF NOT EXISTS `feeding_bottle` (
  `feed1_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `diaper_changed` (
  `change_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `start_date` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `mom_weight` (
  `mom_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `weight` double NOT NULL,
  `date` date NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);

CREATE TABLE IF NOT EXISTS `baby_head` (
  `measure_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `measure` double NOT NULL,
  `date` date NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `baby_teeth` (
  `teeth_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `date` date NOT NULL,
  `upper_jaw` varchar(30) NOT NULL,
  `lower_jaw` varchar(30) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `baby_weight` (
  `weight_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `date` date NOT NULL,
  `weight` double NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `face_day` (
  `image_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `face_image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS`feed_nursing1` (
  `feed_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `left_duration` time NOT NULL,
  `date` datetime NOT NULL,
  `nursing_side` varchar(8) NOT NULL,
  `starting_side` varchar(8) NOT NULL,
  `right_duration` time NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `feed_solids` (
  `solid_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `date` datetime NOT NULL,
  `fruits` int(11) NOT NULL,
  `veg` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `grains` int(11) NOT NULL,
  `dairy` int(11) NOT NULL,
  `note` varchar(20) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `medications_records` (
  `med_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `date` datetime NOT NULL,
  `type` text NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `sleep_records` (
  `sleep_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `temperature_records` (
  `temp_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `temp` double NOT NULL,
  `date` datetime NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `vaccine_records` (
  `vaccine_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` datetime NOT NULL,
  `type` text NOT NULL,
  `note` varchar(200) NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
);
CREATE TABLE IF NOT EXISTS `height_records` (
  `height_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` datetime NOT NULL,
  `measure` text NOT NULL,
  `baby_id` int(11) NOT NULL,
  FOREIGN KEY (`baby_id`) REFERENCES `complete_info`(`info_id`)
)
