<?php

namespace drlenux\imageHelper\convert;

/**
 * Class PngConvert
 * @package drlenux\imageHelper\convert
 */
class PngConvert extends AConvert
{
    /**
     * @inheritDoc
     */
    public function save($image)
    {
        imagepng($image, $this->path);
    }

    /**
     * @inheritDoc
     */
    public function load()
    {
        return imagecreatefrompng($this->path);
    }
}
