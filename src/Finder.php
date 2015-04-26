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

        foreach($this->yieldFilesInPath($specification, $dsn->getPath()) as $location) {
            yield $location;
        }
    }

    /**
     * @param SpecificationInterface $specification
     * @param string                 $path
     *
     * @return \Generator
     */
    private function yieldFilesInPath(SpecificationInterface $specification, $path)
    {
        $iterator = new \DirectoryIterator($path);
        foreach ($iterator as $location) {
            if ($location->isDot()) {
                continue;
            }

            if ($specification->isSatisfiedBy($location)) {
                if ($location->isDir()) {
                    foreach ($this->yieldFilesInPath($specification, $location->getRealPath()) as $returnedLocation) {
                        yield $returnedLocation;
                    }
                    continue;
                }

                yield new File($location->getRealPath());
            }
        }
    }
}
