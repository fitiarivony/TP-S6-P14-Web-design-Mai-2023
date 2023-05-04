create database seo;

\c seo;

create sequence categorie_seq;
create table categorie(
    id serial primary key,
    idcategorie varchar(15) not null default 'CAT'||nextval('categorie_seq'),
    nomcategorie varchar(40)
);
insert into categorie(nomcategorie) values
('Jeux'),('Loisirs'),('Educatif'),('Science'),('Litterature'),('Mode')
;

create sequence article_seq;
create table article(
    id serial primary key,
    idarticle varchar(15) not null default 'ART'||nextval('article_seq'),
    titre varchar(100) not null,
    idcategorie integer not null,
    resumee text not null,
    contenu text not null,
    FOREIGN KEY (idcategorie) references categorie(id)
);
insert into article(titre,idcategorie,resumee,contenu)values('PUBG est vraiment genial',1,'PUBG est superbe','La meilleur app de tout est PUGB');



