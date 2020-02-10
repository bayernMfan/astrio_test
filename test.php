<?php

//TASK_2
/*
$host='127.0.0.1';
$dbname='test_task_2';
$user='root';
$pswd='';
#PDO_MYSQL
$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswd);
$STH1 = $DBH->query('SELECT name FROM department WHERE (SELECT department_id FROM worker GROUP BY department_id HAVING COUNT(*)>4 AND department_id=id)');
foreach ($STH1 as $row) {
    print $row['name'] . "\t"."\n";
}
$STH2 = $DBH->query('SELECT name, GROUP_CONCAT(worker.id) as worker_id FROM department,worker WHERE department.id=worker.department_id GROUP BY department.name');
foreach ($STH2 as $row) {
    print $row['name'] . "\t";
    print $row['worker_id'] . "\t"."\n";
}

//SELECT name, GROUP_CONCAT(worker.id) as worker_id FROM department,worker WHERE department.id=worker.department_id GROUP BY department.name
*/
//TASK4
/*
$corr_str="<a><div></div></a><span></span>";
$incorr_str ='<a><div></a>';
//$r1 = '|<[^>]+>(.*)</[^>]+>|';
$reg = "|<[^>]+>|";
preg_match($reg, $corr_str, $out, PREG_OFFSET_CAPTURE);

$first_tag = htmlspecialchars($out[0][0]);
echo $first_tag;
preg_match('|\w|',$first_tag,$first_tag,PREG_OFFSET_CAPTURE);
var_dump($first_tag);
$reg_second_tag = '|</'.$first_tag.'>|';
*/
//echo $reg_second_tag;
/*
preg_match_all($r1,$corr_str,$out, PREG_PATTERN_ORDER);
//$out = preg_split($r1, $corr_str);
echo '<pre>';
echo htmlspecialchars($out[0][0]);
echo '</pre>';
echo '<pre>';
echo htmlspecialchars($out[1][0]);
echo '</pre>';
//print_r($out);
preg_match_all($r1,$out[1][0],$out, PREG_PATTERN_ORDER);
echo '<pre>';
echo htmlspecialchars($out[0][0]);
echo '</pre>';
echo '<pre>';
echo htmlspecialchars($out[1][0]);
echo '</pre>';
//var_dump($out);
//print_r($out);
*/


