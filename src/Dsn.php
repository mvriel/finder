<?php

namespace phpDocumentor\Files;

final class Dsn
{
    private $dsnString;

    private $scheme = '';
    private $host = '';
    private $port = 0;
    private $username = '';
    private $password = '';
    private $path = '';

    public function __construct($dsnString)
    {
        $this->dsnString = $dsnString;

        $dsnUrl = parse_url($dsnString);

        $this->scheme   = isset($dsnUrl['scheme']) ? $dsnUrl['scheme'] : '';
        $this->host     = isset($dsnUrl['host']) ? $dsnUrl['host'] : '';
        $this->port     = isset($dsnUrl['port']) ? $dsnUrl['port'] : 0;
        $this->username = isset($dsnUrl['user']) ? $dsnUrl['user'] : '';
        $this->password = isset($dsnUrl['pass']) ? $dsnUrl['pass'] : '';
        $this->path     = isset($dsnUrl['path']) ? $dsnUrl['path'] : '';
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->dsnString;
    }
}
