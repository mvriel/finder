<?php

namespace phpDocumentor\Files\Specification;

use Rb\Specification\CompositeSpecification;

class InPath extends CompositeSpecification
{
    /** @var string */
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Returns a boolean indicating whether or not this specification can support the given value.
     *
     * @param \SplFileInfo $value
     *
     * @return bool
     */
    public function isSatisfiedBy($value)
    {
        return (strpos($value->getRealPath(), $this->path) === 0);
    }
}
