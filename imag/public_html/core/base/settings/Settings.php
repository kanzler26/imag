<?php

class Settings {
    static private $_instance;
    private $templateArr=[
        'text'=>['name','phone','address'],
        'textarea'=>['content','keywords'],
    ];
    private $routes = [
    'admin'=>[
        'alias'=>'admin',
        'path'=>'core/admin/controller',
        'hrUrl'=>false
    ],
    'settings'=>[
        'path'=>'core/base/settings/'
    ],
    'plugins'=>[
        'path'=>'core/plugins/',
        'hrUrl'=>false ,
        'dir'=>false,
    ],
    'user'=>[
        'path'=>'core/user/controller/',
        'hrUrl'=>true,
        'routes'=>[]
    ],
    'default'=>[
        'controller'=>'IndexController',
        'inputMethod'=>'inputData',
        'outputMethod'=>'outputData'
    ]
];

    private function __construct(){}
    private function __clone(){}

    static public function get($property) {
        return self::instance()->$property;
    }

    static public function instance() {// у автора называется instance, хотя в RouteController называется по другому....
        if(self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance= new self;
    }



    public function clueProperties($class){
    $baseProperties=[];
        foreach ($this as $name=>$item) { //в $this будет лежать объект который был получен в ShopSettings в строке $baseProperties.
            $property = $class::get($name); //сохранаяем свойство класса которое мы передали в качестве параметра.
    if(is_array($property)&& is_array($item)) {
$baseProperties[$name]=$this->arrayMergeRecursive($this->$name,$property);
continue;
    }
    if(!$property) $baseProperties[$name]=$this->$name;
    }
return $baseProperties;
    }
    public function arrayMergeRecursive() {
        $arrays=func_get_args();
        $base=array_shift($arrays);

        foreach($arrays as $array){
            foreach($array as $key =>$value) {
                if(is_array($value) && is_array($base[$key])) {
                    $base[$key]=$this->arrayMergeRecursive($base[$key],$value);
                }else{
                    if(is_int($key)) {
                        if(!in_array($value,$base)) array_push($base,$value);
                        continue;
                        }
                    $base[$key]=$value;
                    }
                }
            }return $base;
        }


}

