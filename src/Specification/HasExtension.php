<?php

namespace phpDocumentor\Files\Specification;

use Rb\Specification\CompositeSpecification;

class HasExtension extends CompositeSpecification
{
    /** @var string[] */
    private $extensions;

    public function __construct(array $extensions)
    {
        $this->extensions = $extensions;
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
        return (in_array($value->getExtension(), $this->extensions));
    }
}
