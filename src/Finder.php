<?php

namespace phpDocumentor\Files;

use Rb\Specification\SpecificationInterface;

class Finder
{
    public function matches(Dsn $dsn)
    {
        return ($dsn->getScheme() == 'file' || $dsn->getScheme() == '');
    }

    public function find(Dsn $dsn, SpecificationInterface $specification)
    {
        if ($this->matches($dsn) === false) {
            throw new \RuntimeException(
                sprintf(
                    'The provided DSN "%s" cannot be used to find files using the "%s" class',
                    (string)$dsn,
                    get_class($this)
                )
            );
        }

        $iterator = new \DirectoryIterator($dsn->getPath());
        foreach ($iterator as $path) {
            if ($path->isDot()) {
                continue;
            }

            if ($specification->isSatisfiedBy($path)) {
                yield new File($path->getRealPath());
            }
        }
    }
}
