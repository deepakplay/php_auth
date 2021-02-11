create database php_deepak;
use php_deepak;

create table users(
    id int auto_increment primary key,
    fname varchar(50) not null,
    email varchar(50) not null,
    pass varchar(60) not null
);

create table user_table(
    user_id int primary key,
    gender enum('m', 'f', 'n') default 'n',
    phone varchar(15),
    dob date default '2000/01/01',
    country varchar(25) default 'u',
    foreign key (user_id) references users(id) on delete cascade on update cascade
);

select id, fname, email, pass, gender, phone, dob, country from users inner join user_table where users.id = user_table.user_id;