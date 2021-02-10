create table users(
	id int auto_increment primary key,
	fname varchar(50) not null,
    email varchar(50) not null,
    pass varchar(60) not null
);


create table user_table(
	user_id int primary key,
    gender enum('m', 'f'),
    phone varchar(12),
    dob date default '2000/01/01',
    country varchar(25) default 'India',
    state varchar(25) default 'Tamilnadu',
    foreign key (user_id) references users(id)
		on delete cascade on update cascade
);


insert into user_table (user_id, gender, phone, dob, country, state) values (1, 'm', '+91987654321', '1998-07-14', 'India', 'Tamilnadu');
insert into user_table (user_id, gender, phone, dob, country, state) values (2, 'f', '+91234567890', '1990-12-15', 'India', 'Tamilnadu');