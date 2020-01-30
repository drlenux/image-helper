<?php

namespace drlenux\imageHelper\convert;

/**
 * Interface Convert
 * @package drlenux\imageHelper\convert
 */
interface Convert
{
    /**
     * Convert constructor.
     * @param string $filePath
     */
    public function __construct($filePath);

    /**
     * @param resource $image
     * @return void
     */
    public function save($image);

    /**
     * @return resource|false
     */
    public function load();

    /**
     * @return array
     */
    public function getInfo();
}
