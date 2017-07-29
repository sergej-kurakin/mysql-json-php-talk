CREATE TABLE `jsonindex` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data` json DEFAULT NULL,
  `g` int(11) GENERATED ALWAYS AS (json_extract(`data`,'$.param')) VIRTUAL,
  PRIMARY KEY (`id`),
  KEY `i` (`g`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
