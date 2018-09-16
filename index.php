<?
function print_arr($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}


//Format: dd-mm-yyyy
//$string = '21-11-2015';
//$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
//Год 2015, месяц 11, день 21
//$replacement = "Год $3, месяц $2, день $1";
//echo preg_replace($pattern, $replacement, $string);



//Front controller

//1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

//3. Установка соединения с БД

//4. Вызов Router
$router = new Router();
$router->run();

//echo '<pre>';
//print_r($router->routes);