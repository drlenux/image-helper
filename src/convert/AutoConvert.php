<?php


namespace drlenux\imageHelper\convert;


class AutoConvert extends AConvert
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * AutoConvert constructor.
     * @param $filePath
     * @param null|string $type
     */
    public function __construct($filePath, $type = null)
    {
        $this->type = $type;
        parent::__construct($filePath);
    }

    /**
     * @inheritDoc
     */
    public function save($image)
    {
        $func = 'image' . $this->getType();
        call_user_func($func, $image, $this->path);
    }

    /**
     * @inheritDoc
     */
    public function load()
    {
        $func = 'imagecreatefrom' . $this->getType();
        call_user_func($func, $this->path);
    }

    /**
     * @return string
     */
    private function getType()
    {
        if (null !== $this->type) {
            return $this->type;
        }

        $type = explode('.', strrev($this->path))[0];
        $type = strrev(strtolower($type));

        switch ($type) {
            case 'jpg':
                $this->type = 'jpeg';
                break;
            default:
                $this->type = $type;
                break;
        }

        return $this->type;
    }
}