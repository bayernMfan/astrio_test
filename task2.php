<?php
$host='127.0.0.1';
$dbname='test';
$user='root';
$pswd='';
#PDO_MYSQL
$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswd);
//Выводит название отделов, в которых имеется 5 и более сотрудников
$STH1 = $DBH->query('SELECT name FROM department WHERE (SELECT department_id FROM worker GROUP BY department_id HAVING COUNT(*)>4 AND department_id=id)')->fetchAll(PDO::FETCH_NUM);
foreach ($STH1 as $item) {
    echo "department name =>".$item[0]."</br>";
}
echo "</br>";
//Выводит 2 столбца, в первом выводится название отдела, во втором id всех сотрудников данного отдела, перечисленные через запятую.
$STH2 = $DBH->query('SELECT name, GROUP_CONCAT(worker.id) as worker_id FROM department,worker WHERE department.id=worker.department_id GROUP BY department.name')->fetchAll(PDO::FETCH_KEY_PAIR);
foreach ($STH2 as $key=>$value) {
    echo $key."=>".$value."</br>";
}