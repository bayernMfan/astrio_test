<?php
require_once "MyCookie.php";

$cookie1 = MyCookie::getInstance();
$cookie2 = MyCookie::getInstance();
if ($cookie1 === $cookie2) {
    echo "Singleton works, both variables contain the same instance.";
} else {
    echo "Singleton failed, variables contain different instances.";
}
echo "</br>";
//$cookie1->setCookie('key', 'value');
//$cookie2->setCookie('name', 'value');

//$cookie1->updateCookie('name', 'name', 10);
echo $cookie2->getCookie('key');
//$cookie1->deleteCookie('key');
echo "</br>";
print_r($_COOKIE);


