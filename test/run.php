<?php

require __DIR__ . '/../vendor/autoload.php';

use drlenux\imageHelper\ImageConvert;
use drlenux\imageHelper\ImageToArray;
use drlenux\imageHelper\StringToImage;
use drlenux\imageHelper\convert\AutoConvert;

$img = (new StringToImage())
    ->setText('Hello World')
    ->setBackground(255, 0, 0)
    ->setColor(250, 255, 255)
    ->setSize(100)
    ->setPadding(1, 1)
    ->generate()
    ->save(new AutoConvert(__DIR__ . '/tmp/hw.png'))
    ->getImage();

$img2 = (new ImageConvert())
    ->setImage($img)
    ->resize(550, 50)
    ->toContrast()
    ->save(new AutoConvert(__DIR__ . '/tmp/hwc.png'))
    ->getImage();

$arr = (new ImageToArray())
    ->setImg($img2, 50, 10)
    ->getArray();

$res = [];

for ($x = 0; $x < count($arr); ++$x) {
    for ($y = 0; $y < count($arr[0]); ++$y) {
        foreach (['red', 'green', 'blue'] as $color) {
            if (isset($res[$color][$arr[$x][$y][$color]])) {
                $val = $res[$color][$arr[$x][$y][$color]];
            } else {
                $val = 0;
            }
            $val++;
            $res[$color][$arr[$x][$y][$color]] = $val;
        }
    }
}

dump($res);