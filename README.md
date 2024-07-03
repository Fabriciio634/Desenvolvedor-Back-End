# Desenvolvedor-Back-End

Cria um banco com o nome "testingdb"

Rodar o seguinte comando para criar a tabela:

```CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;```

Popular a tabela com os seguintes dados:

```INSERT INTO `cliente` (`id`, `firstname`, `lastname`, `address`) VALUES
(1, 'Lucas ', 'Oliveira', 'Sao Paulo'),
(2, 'Angelica ', 'Ramos', 'Minas Gerais'),
(3, 'Rodrigo ', 'Lima', 'Goias'),
(4, 'Joao ', 'Antonio', 'Distrito Federal'),```

```ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);```

```ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;```

  Utilizar Xampp para rodar o projeto no localhost:8000

Instalar composer na sua maquina
https://getcomposer.org/download/

Rodar o comando "composer install"

criar uma arquivo  .env baseado no arquivo .env.example com os valores dobanco de dados local
