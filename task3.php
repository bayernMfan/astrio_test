<?php
// Для реализации хранения тел.справочника нам понадобится реализовать связь "многие-ко-многим"
// Шаг 1 - создать исходные таблицы
$host='127.0.0.1';
$dbname='test';
$user='root';
$pswd='';
#PDO_MYSQL
// Создаем табличку телефонов
$table = "phone";
try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswd);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $sql ="CREATE table $table(
        id INT(11) NOT NULL PRIMARY KEY);";
    $DBH->exec($sql);
    print("Created $table Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}
// Создаем таблицу владельцев
$table = "owner";
try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswd);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $sql ="CREATE table $table(
        id INT(11) NOT NULL PRIMARY KEY,
        first_name varchar(100) NOT NULL,
        last_name varchar(100) NOT NULL,
        middle_name varchar(100) NOT NULL
    );";
    $DBH->exec($sql);
    print("Created $table Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}
// Создаем промежуточную таблицу Телефон_Владелец
$table = "phone_owner";
try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswd);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $sql ="CREATE table $table(
        phone_id INT(11) NOT NULL,
        owner_id INT(11) NOT NULL,
        FOREIGN KEY (phone_id) REFERENCES phone(id),
        FOREIGN KEY (owner_id) REFERENCES owner(id)
    );";
    $DBH->exec($sql);
    print("Created $table Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}
// Далее можно заполнять таблицы phone и owner,
// а затем заполнять связующую таблицу комбинациями значений индентификаторов телефонов и владельцев.
// Например: 1-1, 1-2, 3-1. Будет озночать что у номера с id==1 два владельца c id==1 и id==2 соответственно.
// с другой стороны означает, что у владельца с id==1 два телефона с id==1 и id==3 соответсвтенно.