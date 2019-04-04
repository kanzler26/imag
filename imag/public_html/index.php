<?php
define('VG_ACCESS',true);
header('Content-Type:text/html;charset=utf-8');// сообщаем браузеру пользователя в какой кодировке мы будем отсылать данные
session_start();
require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';

use core\base\exceptions\RouteException;// указание пространства имен, директория и указываемый файл.
use core\base\controller\RouteController;// указание пространства имен, директория и указываемый файл.


try {
    RouteController::instance()->route();
$dasha=RouteController::instance();
    $artur=RouteController::instance();

   echo $dasha->hair.'<br>';
    echo $artur->hair.'<br>';

    $dasha->hair='зеленые';

    echo $dasha->hair.'<br>';
    echo $artur->hair.'<br>';

}catch (RouteException $e) {
    exit($e->getMessage());

}
