<?php


namespace drlenux\imageHelper\convert;


abstract class AConvert implements Convert
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @inheritDoc
     */
    public function getInfo()
    {
        return getimagesize($this->path);
    }

    /**
     * @inheritDoc
     */
    public function __construct($filePath)
    {
        $this->path = $filePath;
    }
}