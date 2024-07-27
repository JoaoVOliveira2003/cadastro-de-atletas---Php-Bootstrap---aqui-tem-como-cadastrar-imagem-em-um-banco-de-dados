CREATE TABLE `atletas` (
  `id_atletas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `instituicao` varchar(10) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `rg` varchar(10) DEFAULT NULL,
    basquete BOOLEAN,
    futebolCampo BOOLEAN,
    futsal BOOLEAN,
    handebol BOOLEAN,
    tenisDeMesa BOOLEAN,
    voleibol BOOLEAN,
    voleiPraia BOOLEAN,
    xadrez BOOLEAN,
);

ALTER TABLE tads.atletas ADD caminhoImage VARCHAR(50);
