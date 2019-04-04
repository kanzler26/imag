<?php


namespace core\base\settings;
use core\base\settings\Settings;


class ShopSettings{
    private $routes = [
        'plugins'=>[
            'path'=>'core/plugins/',
            'hrUrl'=>false ,
            'dir'=>false,
            'routes'=>[

            ],
        ],

    ];

    private $templateArr=[
        'text'=>['name','phone','address','price','short'],
        'textarea'=>['content','keywords','goods_content'],
    ];
    private $baseSettings;

    private function __construct(){}
    private function __clone(){}

    static private $_instance;

    static public function get($property) {
        return self::instance()->$property;//через обращение к публ методу возвращает свойство.
    }

    static public function instance() {// у автора называется instance, хотя в RouteController называется по другому....

        if(self::$_instance instanceof self) {
           return self::$_instance;
        }
         self::$_instance = new self;
        self::$_instance->baseSettings=Settings::instance();

          //в свойстве baseSettings хранится ссылка на объект класса Settings.
            $baseProperties=self::$_instance->baseSettings->clueProperties(get_class());//создаем метод clueProperties с параметром функция get_class(), который возвращает имя класса.
        self::$_instance->setProperty($baseProperties);
        return self::$_instance;
        }

        protected function setProperty($properties) {
        if($properties) {
            foreach($properties as $name =>$property) {
                $this->$name=$property;
            }
        }
        }


}