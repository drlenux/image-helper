<?php

namespace drlenux\imageHelper;

use drlenux\imageHelper\convert\Convert;

/**
 * Class StringToImage
 * @package drlenux\imageHelper
 */
class StringToImage
{
    private $img;
    private $height = null;
    private $width = null;
    private $size = 2;
    private $background = [255, 255, 255];
    private $color = [0, 0, 0];
    private $padding = [0, 0];
    private $text;

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @return $this
     */
    public function setBackground($red, $green, $blue)
    {
        $this->background = [$red, $green, $blue];
        return $this;
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @return $this
     */
    public function setColor($red, $green, $blue)
    {
        $this->color = [$red, $green, $blue];
        return $this;
    }

    /**
     * @param int $x
     * @param int $y
     * @return $this
     */
    public function setPadding($x, $y)
    {
        $this->padding = [$x, $y];
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return $this
     */
    public function generate()
    {
        $this->initWH();
        $this->img = imagecreate($this->width, $this->height);
        imagecolorallocate($this->img, ...$this->background);
        $text = imagecolorallocate($this->img, ...$this->color);
        list($x, $y) = $this->padding;
        imagestring($this->img, $this->size, $x, $y, $this->text, $text);
        return $this;
    }

    /**
     * @param Convert $convert
     * @return $this
     */
    public function save(Convert $convert)
    {
        $convert->save($this->img);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->img;
    }

    private function initWH()
    {
        if (null === $this->width) {
            $this->width = imagefontwidth($this->size) * strlen($this->text) + $this->padding[0];
        }

        if (null === $this->height) {
            $this->height = imagefontheight($this->size) + $this->padding[1];
        }
    }
}