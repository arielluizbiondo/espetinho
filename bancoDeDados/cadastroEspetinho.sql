create database atividadeEspetinho;
use atividadeEspetinho;
drop table cadastroEspetinho;
create table cadastroEspetinho(
    idCadastroEspetinho int primary key auto_increment,
    nomeEspeto varchar(255),
    descricao varchar(255),
    valor decimal(10,2),
    quantidade int
);

create table pagamemento(
    idPagamento int primary key auto_increment,
    formaDePagamento varchar(100),
    Endereco text,
    NumeroCartao char(17),
    senha varchar(255)
);

INSERT INTO cadastroEspetinho VALUES(null,'Espeto de carne.','A carne desse maravilho espeto,
é do animal boi primiu.', 21.99, 311);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de Coração.','O coração desse maravilho espeto,
é do animal corno.', 19.99, 411);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de Kafta.','A carne desse maravilho espeto,
é do animal boi mia.', 18.99, 377);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de Frango.','A carne desse maravilho espeto,
é do animal frango.', 12.99, 124);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de Linguiça.','A carne desse maravilho espeto,
é do animal Tulipa', 9.99, 195);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de linguiça.','A carne desse maravilho espeto,
é do animal la ele.', 14.99, 196);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto de Lombo.','A carne desse maravilho espeto,
é do animal qlqr um', 3.99, 215);
INSERT INTO cadastroEspetinho VALUES(null,'Espeto Misto.','A carne desse maravilho espeto,
é do animal', 7.99, 157);