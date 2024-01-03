<?php
#EASY DATABASE SETUP
require __DIR__ . '/infra/db/connection.php';

#CREATE TABLE
// $pdo->exec(
//     'CREATE TABLE users (
//     id INTEGER PRIMARY KEY AUTO_INCREMENT, 
//     name varchar(50)	, 
//     lastname varchar(50)	, 
//     phoneNumber varchar(50)	, 
//     email varchar(50)	 NOT NULL, 
//     foto blob	 NULL, 
//     administrator bit, 
//     password varchar(200)	
//     );
//     '
// );

$pdo->exec(
    'CREATE TABLE categories (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        category varchar(50)
    );
    '
);

$pdo->exec(
    'CREATE TABLE type (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        category varchar(50)
    );
    '
);

$pdo->exec(
    'CREATE TABLE shows (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_category INTEGER,
        id_type INTEGER,
        title varchar(50),
        description varchar(250),
        seasons INTEGER,
        rating float,
        release_date date,
        trailer varchar(250),
        poster blob,
        cover blob NULL,
        FOREIGN KEY (id_category) REFERENCES categories(id),
        FOREIGN KEY (id_type) REFERENCES type(id)
        );
    '
);

$pdo->exec(
    'CREATE TABLE user_reviews (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_user INTEGER,
        id_show INTEGER,
        comment varchar(250),
        rating float,
        attachments blob,
        review_date date,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_show) REFERENCES shows(id)
    );
    '
);



$pdo->exec(
    'CREATE TABLE shared_content (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        shared_id INTEGER,
        show_id INTEGER,
        FOREIGN KEY (shared_id) REFERENCES users(id),
        FOREIGN KEY (show_id) REFERENCES shows(id)
    );
    '
);

$pdo->exec(
    'CREATE TABLE share_list (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        sender_id INTEGER,
        destination_id INTEGER,
        shared_date date,
        FOREIGN KEY (sender_id) REFERENCES users(id),
        FOREIGN KEY (destination_id) REFERENCES users(id)
    );
    '
);
?>