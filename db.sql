create table transform(
    id int,
    name varchar(255),
    path text,
    primary key (id)
);

create table users(
    id int,
    name varchar(255),
    email text,
    password text,
    admin boolean,
    primary key (id)
);

create table posts(
    post_id int,
    title varchar(255),
    paragraph text,
    thump text,
    description text,
    date varchar(255),
    primary key (post_id)
);