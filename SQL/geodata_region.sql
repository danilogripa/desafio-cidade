

CREATE TABLE IF NOT EXISTS `geodata_region` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `countryID` char(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `acronym` char(2) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `countryID` (`countryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `geodata_region`
--

INSERT INTO `geodata_region` (`ID`, `countryID`, `name`, `acronym`, `latitude`, `longitude`) VALUES
(1, 'BR', 'Acre', 'AC', -9.0237964, -70.8119953),
(2, 'BR', 'Alagoas', 'AL', -9.5713058, -36.7819505),
(3, 'BR', 'Amapá', 'AP', 0.9019925, -52.0029565),
(4, 'BR', 'Amazonas', 'AM', -3.4168427, -65.8560646),
(5, 'BR', 'Bahia', 'BA', -12.579738, -41.7007272),
(6, 'BR', 'Ceará', 'CE', -5.4983977, -39.3206241),
(7, 'BR', 'Distrito Federal', 'DF', -15.826691, -47.9218204),
(8, 'BR', 'Espírito Santo', 'ES', -19.1834229, -40.3088626),
(9, 'BR', 'Goiás', 'GO', -15.8270369, -49.8362237),
(10, 'BR', 'Maranhão', 'MA', -4.9609498, -45.2744159),
(11, 'BR', 'Mato Grosso', 'MT', -12.6818712, -56.921099),
(12, 'BR', 'Mato Grosso do Sul', 'MS', -20.7722295, -54.7851531),
(13, 'BR', 'Minas Gerais', 'MG', -18.512178, -44.5550308),
(14, 'BR', 'Pará', 'PA', -1.9981271, -54.9306152),
(15, 'BR', 'Paraíba', 'PB', -7.2399609, -36.7819505),
(16, 'BR', 'Paraná', 'PR', -25.2520888, -52.0215415),
(17, 'BR', 'Pernambuco', 'PE', -8.8137173, -36.954107),
(18, 'BR', 'Piauí', 'PI', -7.7183401, -42.7289236),
(19, 'BR', 'Rio de Janeiro', 'RJ', -22.9139476, -43.2093973),
(20, 'BR', 'Rio Grande do Norte', 'RN', -5.4025803, -36.954107),
(21, 'BR', 'Rio Grande do Sul', 'RS', -30.0346316, -51.2176986),
(22, 'BR', 'Rondônia', 'RO', -11.5057341, -63.580611),
(23, 'BR', 'Roraima', 'RR', 2.7375971, -62.0750998),
(24, 'BR', 'Santa Catarina', 'SC', -27.2423392, -50.2188556),
(25, 'BR', 'São Paulo', 'SP', -23.5431786, -46.6291845),
(26, 'BR', 'Sergipe', 'SE', -10.5740934, -37.3856581),
(27, 'BR', 'Tocantins', 'TO', -10.17528, -48.2982474);