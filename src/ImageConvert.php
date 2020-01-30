<?php

namespace drlenux\imageHelper;

use drlenux\imageHelper\convert\Convert;
use src\App;

/**
 * Class ImageConvert
 * @package drlenux\imageHelper
 */
class ImageConvert
{
    /**
     * @var resource
     */
    private $img;

    /**
     * @param resource $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->img = $image;
        return $this;
    }

    /**
     * @param Convert $convert
     * @return $this
     */
    public function loadImage(Convert $convert)
    {
        $this->img = $convert->load();
        return $this;
    }

    /**
     * @return $this
     */
    public function toContrast()
    {
        imagefilter($this->img, IMG_FILTER_GRAYSCALE);
        imagefilter($this->img, IMG_FILTER_CONTRAST, -100);
        return $this;
    }

    /**
     * @param int $newWidth
     * @param int $newHeight
     * @return $this
     */
    public function resize($newWidth, $newHeight)
    {
        $this->img = imagescale($this->img, $newWidth, $newHeight);
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
     * @return resource
     */
    public function getImage()
    {
        return $this->img;
    }
}