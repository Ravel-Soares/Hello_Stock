CREATE DATABASE hello_stock;

USE hello_stock;

-- Estrutura da tabela usuario

CREATE TABLE usuario (
  cod int(15) NOT NULL AUTO_INCREMENT,
  login varchar(50) NOT NULL,
  nome varchar(95) DEFAULT NULL,
  cpfcnpj varchar(20) NOT NULL,
  social varchar(95) DEFAULT NULL,
  cep varchar(8) DEFAULT NULL,
  endereco varchar(95) DEFAULT NULL,
  bairro varchar(95) DEFAULT NULL,
  contato varchar(11) DEFAULT NULL,
  email varchar(95) DEFAULT NULL,
  endumero varchar(10) DEFAULT NULL,
  cidade varchar(18) DEFAULT NULL,
  estado varchar(18) DEFAULT NULL,
  senha varchar(100) NOT NULL,
  status_usu enum('1','0') NOT NULL,
   PRIMARY KEY (cod) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela funcionario
--

CREATE TABLE funcionario (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(30) NOT NULL,
  nome varchar(30) NOT NULL,
  senha varchar(30) NOT NULL,
  status_usu varchar(10) NOT NULL,
  tel varchar(11) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela fornecedor
--

CREATE TABLE fornecedor (
  id int(15) NOT NULL AUTO_INCREMENT,
  for_nome varchar(95) DEFAULT NULL,
  for_empresa varchar(95) DEFAULT NULL,
  for_cnpj varchar(11) DEFAULT NULL,
  for_cep varchar(8) DEFAULT NULL,
  for_endereco varchar(95) DEFAULT NULL,
  for_bairro varchar(95) DEFAULT NULL,
  for_contato varchar(11) DEFAULT NULL,
  for_ramal varchar(6) DEFAULT NULL,
  for_email varchar(95) DEFAULT NULL,
  for_endnumero varchar(95) DEFAULT NULL,
  for_cidade varchar(95) DEFAULT NULL,
  for_estado varchar(95) DEFAULT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela intensentrada
--

CREATE TABLE itensentrada (
  id int(11) not null AUTO_INCREMENT, 
  pro_cod int(11) DEFAULT NULL,
  pro_quantidade int(11) DEFAULT NULL,
  data_entrada date DEFAULT NULL,
  valor_unitario double DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Estrutura da tabela produto
--

CREATE TABLE produto (
  pro_cod int(50) NOT NULL,
  pro_nome varchar(95) DEFAULT NULL,
  pro_descricao varchar (500) DEFAULT NULL,
  pro_sup varchar(200) NOT NULL,
  pro_valorpago double DEFAULT NULL,
  pro_valorvenda double DEFAULT NULL,
  pro_quantidade int(200) NOT NULL,
  imagens varchar(200) NOT NULL,
  pro_promocoes enum('S','N') NOT NULL,
  pro_valordesconto double NOT NULL,
  localidade varchar (100) NOT NULL, 
   PRIMARY KEY (pro_cod)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Estrutura da tabela intenssaida

CREATE TABLE itenssaida (
  id int(11) not null AUTO_INCREMENT, 
  colaborador int(11) NOT NULL,
  pro_cod int(11) DEFAULT NULL,
  pro_quantidade int(11) DEFAULT NULL,
  data_saida date DEFAULT NULL,
  valor_unitario decimal(9,2) DEFAULT 0.00,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
 

-- Estrutura da tabela carrinho
--

CREATE TABLE carrinho (
  id int(11) NOT NULL AUTO_INCREMENT,
  pro_cod int(11) DEFAULT NULL,
  qtde int(11) DEFAULT NULL,
  valor_unitario decimal(9,2) DEFAULT 0.00,
  data_entrada date DEFAULT NULL,
   PRIMARY KEY (id),
   CONSTRAINT fk_pro_cod FOREIGN KEY (pro_cod) REFERENCES produto (pro_cod)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela opvenda
--

CREATE TABLE opvenda (
  ven_cod int(15) NOT NULL AUTO_INCREMENT,
  ven_data datetime DEFAULT NULL,
  ven_total double DEFAULT NULL,
  ven_nparcelas int(11) DEFAULT NULL,
  cli_cod int(11) DEFAULT NULL,
  fun_cod int(11) DEFAULT NULL,
   PRIMARY KEY (ven_cod),
   CONSTRAINT fk_cli_cod FOREIGN KEY ( cli_cod) REFERENCES usuario ( cod),
   CONSTRAINT fk_fun_cod FOREIGN KEY ( fun_cod) REFERENCES funcionario ( id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela relatorio_funcionario
--

CREATE TABLE relatorio_funcionario (
  id int (10) not null AUTO_INCREMENT,
  colaborador varchar(30) NOT NULL,
  total_vendido_d decimal(9,2) DEFAULT 0.00,
  total_vendido_m decimal(9,2) DEFAULT 0.00,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estrutura da tabela relatorio_pedidos
--

CREATE TABLE relatorio_pedidos (
  id int (10) not null AUTO_INCREMENT,
  produto varchar(30) NOT NULL,
  localidade varchar(30) NOT NULL,
  quantidade int(11) NOT NULL,
  data date NOT NULL,
  status varchar(50) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER $$
CREATE TRIGGER Tgr_ItensSaida_Delete AFTER DELETE ON itenssaida FOR EACH ROW BEGIN
	UPDATE Produto SET pro_quantidade = pro_quantidade + OLD.pro_quantidade
WHERE pro_cod = OLD.pro_cod;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER Tgr_ItensSaida_Insert AFTER INSERT ON itenssaida FOR EACH ROW BEGIN
	UPDATE Produto SET pro_quantidade = pro_quantidade - NEW.pro_quantidade
WHERE pro_cod = NEW.pro_cod;
END
$$
DELIMITER ;

-- Extraindo dados da tabela produto
--

INSERT INTO produto (pro_cod, pro_nome, pro_descricao, pro_sup, pro_valorpago, pro_valorvenda, pro_quantidade, imagens, pro_promocoes, pro_valordesconto, localidade ) VALUES
(1, 'Tinta Suvinil Criativa', 'Suvinil Criativa é a tinta ideal para quem ama inovar no visual da casa. É abrir e pintar. Não precisa nem diluir. Praticidade e beleza', 'Parede', 50, 80, 17, 'https://i.imgur.com/nBCa2AI.png', 'N', 0, 'corredor B'),
(2, 'Tinta Suvinil Fosco Completo', 'Suvinil Fosco Completo disfarça as imperfeições da parede com o seu acabamento fosco e vem em todas as cores para você inovar na sua casa.', 'Parede', 50, 80, 18, 'https://i.imgur.com/5CFcYCq.png', 'N', 0, 'Terreo'),
(3, 'Tinta Suvinil Clássica\r', ' A Tinta Suvinil Clássica pode ser aplicada em superfícies internas de massa corrida ou reboco, massa acrílica, texturas, concreto, fibrocimento e gesso de ambientes internos e externos. De fácil aplicação, pode ser utilizada com pistolas de pintura, trinchas, pincéis e rolos de espuma', 'Parede', 50, 80, 0, 'https://i.imgur.com/zydybKt.png', 'S', 75 , 'Andar 2'),
(4, 'Tinta Suvinil Toque De Seda', 'Combine sofisticação e praticidade com Suvinil Toque de Seda. Tinta com acabamento acetinado que mantém o brilho nas paredes por mais tempo.', 'Parede', 70, 90, 10, 'https://i.imgur.com/DZ3xe4d.png', 'N', 0 , 'Andar 5'),
(5, 'Suvinil Tetos', 'Suvinil Tetos é ideal para áreas úmidas manterem uma boa aparência por mais tempo. Uma pintura antimofo e com alto poder de cobertura.', 'teto', 70, 10, 17, 'https://i.imgur.com/Myjb3lQ.png', 'N', 0, 'Andar 9'),
(6, 'Esmalte Suvinil Lousa E Cor', 'O Esmalte Suvinil Lousa e Cor transforma a sua parede em um mural cheio de estilo. São mais de 300 cores com baixo odor e fácil aplicação.', 'Parede', 30, 50, 17, 'https://i.imgur.com/C5KeDLe.png', 'S', 40, 'Platereira 4'),
(7, 'Esmalte Suvinil Ferrugem', 'Suvinil Ferrugem é um epóxi base água para renovar superfícies como metal, pastilha e alvenaria.', 'metal', 40, 60, 13, 'https://i.imgur.com/DaxwZYS.png', 'S', 45, 'Terreo '),
(8, 'Tinta Suvinil Proteção Total', 'Suvinil Proteção Total é proteção garantida por 8 anos. A tinta cobre fissuras e impermeabiliza a superfície. Uma fachada linda e durável.', 'Parede', 40, 60, 8, 'https://i.imgur.com/yrmPq0B.png', 'N', 0, 'Andar 7'),
(9, 'Tinta Suvinil Rende & Cobre Muito', 'Suvinil Rende & Cobre Muito é a tinta que rende mais. Fácil de aplicar e de espalhar e com baixo odor.', 'Parede', 40, 60, 18, 'https://i.imgur.com/1sNpcx9.png', 'N', 0, 'Terreo'),
(10, 'Tinta Suvinil Classica', 'Ela possui alta cobertura, o que a torna muito versátil na hora da pintura. Por não deixar cheiro, também é indicada para dentro de casa.', 'Parede', 40, 60, 8, 'https://i.imgur.com/4t6DGU9.png', 'N', 0, 'Corredor 9'),
(11, 'Kit Suvinil Resina Piso - G', 'Saiba mais sobre Kit Suvinil Resina Piso - G', 'Piso', 25, 35, 14, 'https://i.imgur.com/f80izZs.png', 'N', 0, ' Corredor 1'),
(12, 'Kit Suvinil Resina Piso - P', 'Inove na sua decoração com o Kit Suvinil Resina Piso - P. Mude o visual da sua casa com Piso Cimento Queimado, Resina Piso e Catalisador Piso juntos. Transforme as superfícies e garanta uma atmosfera urbana, moderna e protegida. Para obter o efeito é necessário usar os três produtos juntos de cimento.', 'Piso', 17, 25, 0, 'https://i.imgur.com/f80izZs.png', 'N', 0, 'Corredor 5'),
(13, 'Suvinil Resina Acrílica \r', 'Resina Acrílica da Suvinil dá proteção e brilho para telhas, tijolos e concreto contra sol, chuva e mofo.', 'tijolos e telhas', 40, 55,13, 'https://i.imgur.com/ZdWimo0.png', 'S', 50, 'corredor 5'),
(14, 'Suvinil Silicone\r', 'Suvinil Silicone controla a infiltração na parede e mantém a aparência natural de superfícies de tijolo, concreto e telha.', 'tijolos e telhas', 30, 40,12, 'https://i.imgur.com/T4g3bLw.png', 'N', 0 , ' Plateleira 7'),
(15, 'Suvinil Verniz \r\r', 'Suvinil Verniz Brilho Básico e Tinge e Protege é um verniz copal para madeiras de áreas internas que realça seu aspecto natural com um acabamento brilhante que tem como objetivo valorizar os veios e a cor natural da madeira sem alterar sua cor original.', 'madeira', 45, 55, 10, 'https://i.imgur.com/s4KMR6C.jpeg', 'N', 0, ' corredor 3'),
(16, 'Suvinil Família protegida\r', 'Suvinil Família protegida é a tinta esmalte base solvente resistente à água e à umidade que facilita a limpeza sem perder a cor e o brilho.', 'Paredes', 30, 45, 12, '', 'N', 0, 'Plateleira 2'),
(17, 'Suvinil Diluente Epoxi\r', 'Suvinil Diluente Epóxi é parte do nosso sistema epóxi. Ele é um diluente que prepara o Fundo Branco ou Esmalte Epóxi antes da aplicação.\r\r', 'azulejos e pastilhas', 20, 30, 10, 'https://i.imgur.com/MNL1MlY.png', 'N', 0, 'Corredor'),
(18, 'Suvinil Gesso E Drywall\r', 'A tinta Suvinil Gesso & Drywall dispensa o uso de fundo preparador porque vale por duas. É o fundo e o acabamento da sua parede em uma única lata. Ideal para ser aplicada diretamente no gesso, drywall, reboco, textura, massa corrida e massa acrílica.', 'gesso', 40, 55, 15, 'https://i.imgur.com/e72drra.png', 'N', 0, 'Corredor 6'),
(19, 'Suvinil Branco\r', 'Suvinil Fundo Branco é o complemento, parte do nosso sistema epóxi, que faz o Suvinil Esmalte Époxi durar mais.', 'paredes', 40, 55, 20, 'https://i.imgur.com/eg9epWs.png', 'N', 0, 'Plateleira 2');

--
-- Extraindo dados da tabela funcionario
--

INSERT INTO funcionario (id, login, nome, senha, status_usu, tel) VALUES (1, 'BH001', 'Bruno', '12345', '0', '11948873750');

INSERT INTO funcionario (id, login, nome, senha, status_usu, tel) VALUES (2, 'KS001', 'Karen', '12345', '1', '11981918788');

INSERT INTO funcionario (id, login, nome, senha, status_usu, tel) VALUES (3, 'RS001', 'Ravel', '12345', '0', '11939457593');

INSERT INTO funcionario (id, login, nome, senha, status_usu, tel) VALUES (4, 'KG001', 'Karlo', '12345', '1', '11932432419');

INSERT INTO fornecedor (for_nome, for_empresa, for_cnpj, for_cep, for_endereco, for_bairro, for_contato, for_ramal, for_email, for_endnumero, for_cidade, for_estado) VALUES ('Marcos','TINTAS CORAL LTDA','574830340040001','08745220','Rua das Tintas','Vila Nova','11987562014','3520','contato.marcos@coral.com','35','Sao Paulo','Sao Paulo');

INSERT INTO fornecedor (for_nome, for_empresa, for_cnpj, for_cep, for_endereco, for_bairro, for_contato, for_ramal, for_email, for_endnumero, for_cidade, for_estado) VALUES ('Jose','TINTAS Suvinil LTDA','57483001254878','05487900','Rua dos pisos','Vila Pintada','1115487990','2548','suporte@suvinil.com','78','Sao Paulo','Sao Paulo');