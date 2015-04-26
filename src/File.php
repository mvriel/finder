<?php

namespace phpDocumentor\Files;

final class File
{
    private $path;
    private $name;
    private $contents;

    public function __construct($path)
    {
        $this->path = realpath($path);
        $this->name = basename($path);
        $this->contents = file_get_contents($path);
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getContents()
    {
        return $this->contents;
    }
}
