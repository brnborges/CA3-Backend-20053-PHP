--@author Bruno Borges 20053
--
-- Database: `dbtest`
--
CREATE DATABASE IF NOT EXISTS `dbtest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbtest`;

-- --------------------------------------------------------

--
-- Structure
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `caracteristicas` (`id`, `nome`) VALUES
(1, 'Sport'),
(2, 'Classic'),
(3, 'Turbo'),
(4, 'Economic'),
(5, 'City'),
(6, 'Family long trip');

-- --------------------------------------------------------

--
-- Structure
--

CREATE TABLE `caracteristicas_veiculos` (
  `idCaracteristica` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `ownerName` varchar(17) NOT NULL,
  `marca` varchar(1000) NOT NULL,
  `modelo` varchar(1000) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table 
--
ALTER TABLE `caracteristicas_veiculos`
  ADD PRIMARY KEY (`idCaracteristica`,`idVeiculo`),
  ADD KEY `fk_veiculo` (`idVeiculo`);

--
-- Indexes for table 
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table 
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table 
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
-
--
ALTER TABLE `caracteristicas_veiculos`
  ADD CONSTRAINT `fk_caracteristica` FOREIGN KEY (`idCaracteristica`) REFERENCES `caracteristicas` (`id`),
  ADD CONSTRAINT `fk_veiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

