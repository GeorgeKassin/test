<?php

use classes\Rectangle;
use classes\Circle;
use classes\Triangle;

function autoloder($class)
{
    $class = str_replace("\\", '/', $class);
    $file = __DIR__ . "/{$class}.php";
    if (file_exists($file)) {
        include_once $file;
    }
}
spl_autoload_register('autoloder');

function sortByArea($obj1, $obj2)
{
    if ($obj1->area == $obj2->area) {
        return 0;
    } else {
        return ($obj1->area > $obj2->area) ? -1 : 1;
    }    
}

$rectangle = new Rectangle(
    random_int(1, 100), 
    random_int(1, 100)
);
$circle = new Circle(
    random_int(1, 100)
);
$triangle = new Triangle(
    random_int(1, 100), 
    random_int(1, 100), 
    random_int(1, 100)
);

if (file_exists('data.json')) {
    $file = file_get_contents('data.json');
    $figures = json_decode($file);
}
unset($file);
$figures[] = $rectangle;
$figures[] = $circle;
$figures[] = $triangle;
file_put_contents('data.json', json_encode($figures));
echo "Saved figures\n";
foreach ($figures as $obj) {
    print_r($obj);
    echo "\n";
}
unset($figures);

$data = file_get_contents('data.json');
$arr = json_decode($data);

echo "Loaded figures\n";
foreach ($arr as $obj) {
    print_r($obj);
    echo "\n";
}

usort($arr, 'sortByArea');
echo "Sorted figures\n";
foreach ($arr as $obj) {
    print_r($obj);
    echo "\n";
}

?>