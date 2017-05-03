CREATE TABLE `my_building` (
  `building_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `display_order` smallint(6) NOT NULL,
  `time_created` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

CREATE TABLE `my_property_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0' COMMENT 'ʡ��',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '����',
  `area_id` int(11) NOT NULL DEFAULT '0' COMMENT '����',
  `building_id` int(11) NOT NULL DEFAULT '0' COMMENT 'С��',
  `room_id` int(11) NOT NULL COMMENT '����',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '�۸�',
  `time_created` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

CREATE TABLE `my_room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `building_id` int(10) unsigned NOT NULL,
  `name` varchar(16) CHARACTER SET utf8 NOT NULL,
  `display_order` smallint(6) NOT NULL,
  `time_created` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

