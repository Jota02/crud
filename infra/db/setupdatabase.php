<?php
#EASY DATABASE SETUP
require __DIR__ . '/connection.php';

#CREATE TABLE
// $pdo->exec(
//     'CREATE TABLE users (
//     id INTEGER PRIMARY KEY AUTO_INCREMENT, 
//     name varchar(50)	, 
//     lastname varchar(50)	, 
//     phoneNumber varchar(50)	, 
//     email varchar(50)	 NOT NULL, 
//     foto varchar(50)	 NULL, 
//     administrator bit, 
//     password varchar(200)	
//     );
//     '
// );

// $pdo->exec(
//     'CREATE TABLE categories (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         category_name varchar(50)
//     );
//     '
// );

// $pdo->exec(
//     'CREATE TABLE type (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         show_type varchar(50)
//     );
//     '
// );

// $pdo->exec(
//     'CREATE TABLE shows (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         id_type INTEGER,
//         title varchar(250),
//         description varchar(250),
//         seasons INTEGER,
//         rating float,
//         age varchar(50),
//         release_year year,
//         end_year year,
//         trailer varchar(250),
//         poster_path varchar(250),
//         cover_path varchar(250),
//         FOREIGN KEY (id_type) REFERENCES type(id)
//         );
//     '
// );

// $pdo->exec(
//     'CREATE TABLE show_categories (
//         show_id INTEGER,
//         category_id INTEGER,
//         PRIMARY KEY (show_id, category_id),
//         FOREIGN KEY (show_id) REFERENCES shows(id),
//         FOREIGN KEY (category_id) REFERENCES categories(id)
//     );'
// );

// $pdo->exec(
//     'CREATE TABLE user_reviews (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         id_user INTEGER,
//         id_show INTEGER,
//         comment varchar(250),
//         rating float,
//         attachments varchar(250),
//         review_date date,
//         FOREIGN KEY (id_user) REFERENCES users(id),
//         FOREIGN KEY (id_show) REFERENCES shows(id)
//     );
//     '
// );



// $pdo->exec(
//     'CREATE TABLE shared_content (
//         id INTEGER NOT NULL,
//         sender_id INTEGER NOT NULL,
//         destination_id INTEGER NOT NULL,
//         show_id INTEGER NOT NULL,
//         shared_date datetime DEFAULT current_timestamp(),
//         FOREIGN KEY (sender_id) REFERENCES users(id),
//         FOREIGN KEY (destination_id) REFERENCES users(id),
//         FOREIGN KEY (show_id) REFERENCES shows(id)
//     );
//     '
// );


// $pdo->exec(
//     'CREATE TABLE user_shows (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         user_id INTEGER,
//         show_id INTEGER,
//         saved_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         calendar_date DATE,
//         FOREIGN KEY (user_id) REFERENCES users(id),
//         FOREIGN KEY (show_id) REFERENCES shows(id),
//         UNIQUE(user_id, show_id) 
//     );
//     '
// );

 include __DIR__ . '/db_default_data.php';
 ?>