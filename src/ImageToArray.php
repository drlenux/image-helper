<?php

namespace drlenux\imageHelper;

use drlenux\imageHelper\convert\Convert;

/**
 * Class ImageToArray
 * @package drlenux\imageHelper
 */
class ImageToArray
{
    /**
     * @var resource
     */
    private $img;
    private $width;
    private $height;

    /**
     * @param resource $image
     * @param int $width
     * @param int $height
     * @return $this
     */
    public function setImg($image, $width, $height)
    {
        $this->img = $image;
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    /**
     * @param Convert $convert
     * @return $this
     */
    public function loadImg(Convert $convert)
    {
        $this->img = $convert->load();
        $this->width = $convert->getInfo()[0];
        $this->height = $convert->getInfo()[1];

        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getArray()
    {
        $map = [];
        if (null === $this->img) {
            throw new \Exception("bad resource");
        }

        for ($x = 0; $x < $this->width; ++$x) {
            for ($y = 0; $y < $this->height; ++$y) {
                $index = @imagecolorat($this->img, $x, $y);
                $color = @imagecolorsforindex($this->img, $index);
                $map[$x][$y] = $color;
            }
        }

        return $map;
    }
}