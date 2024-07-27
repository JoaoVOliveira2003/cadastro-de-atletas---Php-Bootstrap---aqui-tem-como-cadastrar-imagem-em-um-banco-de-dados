CREATE TABLE `atletas` (
  `id_atletas` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `instituicao` VARCHAR(10) NOT NULL,
  `matricula` VARCHAR(20) NOT NULL,
  `rg` VARCHAR(10) DEFAULT NULL,
  `basquete` TINYINT(1) DEFAULT NULL,
  `futebolCampo` TINYINT(1) DEFAULT NULL,
  `futsal` TINYINT(1) DEFAULT NULL,
  `handebol` TINYINT(1) DEFAULT NULL,
  `tenisDeMesa` TINYINT(1) DEFAULT NULL,
  `voleibol` TINYINT(1) DEFAULT NULL,
  `voleiPraia` TINYINT(1) DEFAULT NULL,
  `xadrez` TINYINT(1) DEFAULT NULL,
  `caminhoImagem` VARCHAR(500) DEFAULT NULL,
  PRIMARY KEY (`id_atletas`)
);
