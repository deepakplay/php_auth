create database php_deepak;
use php_deepak;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(60) NOT NULL
);

CREATE TABLE user_table(
    user_id INT PRIMARY KEY,
    gender ENUM('m', 'f', 'n') DEFAULT 'n',
    phone VARCHAR(15),
    dob DATE DEFAULT '2000/01/01',
    country VARCHAR(25) DEFAULT 'u',
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

select id, fname, email, pass, gender, phone, dob, country from users inner join user_table where users.id = user_table.user_id;