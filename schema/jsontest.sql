CREATE TABLE `jsontest` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jsontest` (`id`,`data`) VALUES (1,'[]');
INSERT INTO `jsontest` (`id`,`data`) VALUES (2,'{\"key\": \"value\", \"money\": 100, \"someObj\": {\"id\": 3, \"title\": \"Lorum\"}}');
INSERT INTO `jsontest` (`id`,`data`) VALUES (4,'{\"param\": {\"id\": 5, \"title\": \"VilniusPHP\"}, \"action\": \"talk\"}');
