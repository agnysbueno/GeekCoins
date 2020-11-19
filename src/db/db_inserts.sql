-- inserting data into table 'usuario'

INSERT INTO usuario VALUES (1,'Agnys Bueno','guibueno@mail.com','123456',NULL,'11977384615');
INSERT INTO usuario VALUES (2,'Larissa Diniz','laridiniz@mail.com','123456','40085671',NULL);
INSERT INTO usuario VALUES (3,'Ruan Nunes','ruannunes@mail.com','805456',NULL,NULL);
INSERT INTO usuario VALUES (4,'João Vinicius','joao@mail.com','umod054','47894755','11977884455');

-- inserting data into table "endereco"

INSERT INTO endereco VALUES (1,'Avenida Henriqueta Mendes Guerra','4',NULL,NULL,'Vila São João','06401160','Barueri','São Paulo',2);
INSERT INTO endereco VALUES (2,'Praça Quinze de Novembro','15','casa 3', NULL,'Andorinhas','25911-255','Magé','Rio de Janeiro',1);
INSERT INTO endereco VALUES (3,'Travessa Papa João XXIII','24','bloco A','Terminal Rodoviário','Centro','06600-120','Jandira','São Paulo',3);
INSERT INTO endereco VALUES (4,'Rua Antonio Herculano','101','apto 35',NULL,'Alto Cote Gil','15402-586','Olímpia','São Paulo',4);

-- inserting data into table "categoria"

INSERT INTO categoria VALUES (1,'Camiseta');
INSERT INTO categoria VALUES (2,'Caneca');
INSERT INTO categoria VALUES (3,'Capinha');
INSERT INTO categoria VALUES (4,'Mousepad');
INSERT INTO categoria VALUES (5,'Quadro');

-- inserting data into table "colecao"

INSERT INTO colecao VALUES (1,'Blood Label','Os animes mais sangrentos e violentos agora podem fazer parte do seu café');
INSERT INTO colecao VALUES (2,'TV 2 HOME','Decore suas paredes com as séries e filmes que fizeram parte da sua infância');
INSERT INTO colecao VALUES (3,'Total Naruto','A coleção Naruto é a mais completa de todas: de canecas a mousepads, temos tudo que você precisa para deixar sua casa mais geek.');
INSERT INTO colecao VALUES (4,'Bleach Coffee','Canecas inspiradas nos personagens mais icônicos do anime.');
INSERT INTO colecao VALUES (5,'Work of Legends','Leve a batalha ao seu escritório! A coleção League of Legends tem os mousepads que mais combinam com você.');
INSERT INTO colecao VALUES (6,'Você em Akira','Quem é que não gosta de ser exclusivo? A coleção Akira é limitada e personalizada com seu nome!');
INSERT INTO colecao VALUES (7,'Classicos','Coleção para todos os nostalgicos de plantão');

-- inserting data into table "tema"

INSERT INTO tema VALUES (1,'Naruto');
INSERT INTO tema VALUES (2,'Dragon Ball');
INSERT INTO tema VALUES (3,'Hunter x Hunter');
INSERT INTO tema VALUES (4,'Clash Royale');
INSERT INTO tema VALUES (5,'Bleach');
INSERT INTO tema VALUES (6,'Berserk');
INSERT INTO tema VALUES (7,'Mario');
INSERT INTO tema VALUES (8,'Boku no Hero');
INSERT INTO tema VALUES (9,'Akira');
INSERT INTO tema VALUES (10,'LOL');

-- inserting data into table "tag"

INSERT INTO tag VALUES(1, 'Anime');
INSERT INTO tag VALUES(2, 'Mangá');
INSERT INTO tag VALUES(3, 'Filme');
INSERT INTO tag VALUES(4, 'Seriado');
INSERT INTO tag VALUES(5, 'Desenho animado');
INSERT INTO tag VALUES(6, 'Jogo');
INSERT INTO tag VALUES(7, 'Ação');
INSERT INTO tag VALUES(8, 'Aventura');
INSERT INTO tag VALUES(9, 'Comédia');
INSERT INTO tag VALUES(10, 'Terror');
INSERT INTO tag VALUES(11, 'Suspense');
INSERT INTO tag VALUES(12, 'Fantasia');
INSERT INTO tag VALUES(13, 'Ficcção científica');
INSERT INTO tag VALUES(14, 'Amizade');
INSERT INTO tag VALUES(15, 'Shonen');
INSERT INTO tag VALUES(16, 'Shoujo');
INSERT INTO tag VALUES(17, 'Seinen');
INSERT INTO tag VALUES(18, 'Josei');
INSERT INTO tag VALUES(19, 'Isekai');
INSERT INTO tag VALUES(20, 'Mecha');
INSERT INTO tag VALUES(21, 'Slice of Life');
INSERT INTO tag VALUES(22, 'Personalizado');

-- inserting data into table "produto"

INSERT INTO produto VALUES (1,'Caneca Itachi','Os fãs de Naruto não estavam preparados para essa caneca do Itachi!','Caneca com profundidade de 30 centímetros feita em porcelana na cor branca e estampa por sublimação.',33.99,2,3);
INSERT INTO produto VALUES (2,'Caneca Ichigo','A coleção Bleach está cada vez melhor! A famosa caneca Ichigo agora tem duas versões de cores: detalhes em preto ou em vermelho. Para agradar todos os gostos, um verdadeiro item de colecionador!','Caneca com profundidade de 30 centímetros feita em porcelana na cor branca e estampa por sublimação.',36.99,2,4);
INSERT INTO produto VALUES (3,'Mousepad Espada League of Legends','E esse mousepad que parece que a espada tá saindo? 3D tudo de bom','Mousepad feito em espuma',40.00,4,5);
INSERT INTO produto VALUES (4,'Camiseta Luana','Os caçadores de easter eggs e referências piram com essa camiseta!','Camiseta 100% algodão com estampa em sublimação',69.99,1,6);
INSERT INTO produto VALUES (5,'Capinha Nahito Pain','Agora você também pode decorar seu celular com a capinha do Nahito','Capinha de celular para o modelo Samsung Galaxy S8 Plus',29.99,3,3);
INSERT INTO produto VALUES (6,'Caneca Luana','Os caçadores de easter eggs e referências piram com essa caneca!','Caneca com profundidade de 30 centímetros feita em porcelana na cor branca e estampa por sublimação.',39.99,2,6);
INSERT INTO produto VALUES (7,'Caneca Mario World','Caneca para os clássicos fãs da nitendo, não tem como não amar!','Caneca com profundidade de 30 centímetros feita em porcelana na cor branca e estampa por sublimação.',36.99,2,7);
INSERT INTO produto VALUES (8,'Mousepad Luana','Os caçadores de easter eggs e referências piram com esse mousepad!','Mousepad feito em espuma',45.00,4,6);
INSERT INTO produto VALUES (9,'Caneca League of Legends','Caneca com alguns dos melhores personagens dos jogos, para impor respeito!','Caneca com profundidade de 30 centímetros feita em porcelana na cor branca e estampa por sublimação.',36.99,2,5);

-- inserting data into table "imagem"

INSERT INTO imagem VALUES (1,'../../public/assets/images/caneca-itachi.png',1);
INSERT INTO imagem VALUES (2,'../../public/assets/images/caneca-ichigo-hollow-lados.png',2);
INSERT INTO imagem VALUES (3,'../../public/assets/images/mousepad-league-of-legends.png',3);
INSERT INTO imagem VALUES (4,'../../public/assets/images/camisa-akira-luana.png',4);
INSERT INTO imagem VALUES (5,'../../public/assets/images/capinha-pain-s8.png',5);
INSERT INTO imagem VALUES (6,'../../public/assets/images/caneca-akira-luana.png',6);
INSERT INTO imagem VALUES (7,'../../public/assets/images/caneca-mario-world.png',7);
INSERT INTO imagem VALUES (8,'../../public/assets/images/mousepad-akira-luana.png',8);
INSERT INTO imagem VALUES (9,'../../public/assets/images/caneca-league-of-legends.png',9);

-- inserting data into table "pedido"

INSERT INTO pedido VALUES (1,2,107.97,15.00,0.00,92.97,'8880909032984387','Retirada no local');
INSERT INTO pedido VALUES (2,3,160.00,NULL,16.00,176.00,'1230909032984395','Entrega à domicílio');
INSERT INTO pedido VALUES (3,1,89.97,NULL,0.00,89.97,'8734509032984395','Retirada no loocal');
INSERT INTO pedido VALUES (4,4,69.99,20.00,40.00,89.99,'47545090315843698','Entrega à domicílio');
INSERT INTO pedido VALUES (5,2,73.98,0.00,0.00,73.98,'8880909032984444','Retirada no local');

-- inserting data into table "produto_tema"

INSERT INTO produto_tema VALUES (1,1,1);
INSERT INTO produto_tema VALUES (2,2,5);
INSERT INTO produto_tema VALUES (3,3,10);
INSERT INTO produto_tema VALUES (4,4,9);
INSERT INTO produto_tema VALUES (5,5,1);
INSERT INTO produto_tema VALUES (6,6,9);
INSERT INTO produto_tema VALUES (7,7,7);
INSERT INTO produto_tema VALUES (8,8,9);
INSERT INTO produto_tema VALUES (9,9,10);

-- inserting data into table "produto_tag"

INSERT INTO produto_tag VALUES(1, 1, 1);
INSERT INTO produto_tag VALUES(2, 1, 7);
INSERT INTO produto_tag VALUES(3, 1, 8);
INSERT INTO produto_tag VALUES(4, 1, 15);
INSERT INTO produto_tag VALUES(5, 1, 2);
INSERT INTO produto_tag VALUES(6, 2, 1);
INSERT INTO produto_tag VALUES(7, 2, 7);
INSERT INTO produto_tag VALUES(8, 2, 8);
INSERT INTO produto_tag VALUES(9, 2, 11);
INSERT INTO produto_tag VALUES(10, 2, 15);
INSERT INTO produto_tag VALUES(11, 2, 2);
INSERT INTO produto_tag VALUES(12, 3, 6);
INSERT INTO produto_tag VALUES(13, 3, 7);
INSERT INTO produto_tag VALUES(14, 4, 22);
INSERT INTO produto_tag VALUES(15, 4, 2);
INSERT INTO produto_tag VALUES(16, 4, 3);
INSERT INTO produto_tag VALUES(17, 4, 13);
INSERT INTO produto_tag VALUES(18, 5, 1);
INSERT INTO produto_tag VALUES(19, 5, 2);
INSERT INTO produto_tag VALUES(20, 5, 7);
INSERT INTO produto_tag VALUES(21, 5, 8);
INSERT INTO produto_tag VALUES(22, 5, 15);
INSERT INTO produto_tag VALUES(23, 6, 2);
INSERT INTO produto_tag VALUES(24, 6, 3);
INSERT INTO produto_tag VALUES(25, 6, 22);
INSERT INTO produto_tag VALUES(26, 6, 13);
INSERT INTO produto_tag VALUES(27, 8, 2);
INSERT INTO produto_tag VALUES(28, 8, 3);
INSERT INTO produto_tag VALUES(29, 8, 22);
INSERT INTO produto_tag VALUES(30, 8, 13);
INSERT INTO produto_tag VALUES(31, 7, 6);
INSERT INTO produto_tag VALUES(32, 7, 8);
INSERT INTO produto_tag VALUES(33, 9, 6);
INSERT INTO produto_tag VALUES(34, 9, 7);

-- inserting data into table "produto_pedido"

INSERT INTO produto_pedido VALUES (1,6,1,2,73.98);
INSERT INTO produto_pedido VALUES (2,3,2,4,160.00);
INSERT INTO produto_pedido VALUES (3,1,1,1,33.99);
INSERT INTO produto_pedido VALUES (4,5,3,3,89.97);
INSERT INTO produto_pedido VALUES (5,4,4,1,69.99);
INSERT INTO produto_pedido VALUES (6,7,5,2,73.98);
