<?php

namespace drlenux\imageHelper\convert;

/**
 * Class JpegConvert
 * @package drlenux\imageHelper\convert
 */
class JpegConvert extends AConvert
{
    /**
     * @inheritDoc
     */
    public function save($image)
    {
        imagejpeg($image, $this->path);
    }

    /**
     * @inheritDoc
     */
    public function load()
    {
        return imagecreatefromjpeg($this->path);
    }
}
