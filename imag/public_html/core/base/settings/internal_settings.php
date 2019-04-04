<?php
defined('VG_ACCESS') or die('access denied');

const TEMPLATE='templates/default/';//папка по умолчания для шаблонов пользователя
const ADMIN_TEMPLATE='core/admin/view';//папка с шаблонами администратора
const COOKIE_VERSION='1.0.0'; //версия куки, после обновления проверка версии куки пользователей и просьба релогиниться
const CRYPT_KEY='';// ключ шифрования в будущем
const COOKIE_TIME=60;// количество минут бездействия администратора, после чего треб.релогин
const BLOCK_TIME=3;// количество неверных паролей, после которых блокируется пользователь

const QTY=8;//pagination
const QTY_LINKS=3;//отображение товаров и навигация

const ADMIN_CSS_JS=[
    'styles'=>[],
    'scripts'=>[]
];//path for admin panel css and js

const USER_CSS_JS=[
    'styles'=>[],
    'scripts'=>[]
];

use core\base\exceptions\RouteException;// указание пространства имен, директория и указываемый файл.

function autoloadMainClasses($class_name) {
    $class_name=str_replace('\\','/',$class_name);
    if(!@include_once $class_name . '.php'){
        throw new RouteException('Неверное имя файла подключения '.$class_name);
    }
}

spl_autoload_register('autoloadMainClasses');
