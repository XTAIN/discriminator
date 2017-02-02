<?php

namespace XTAIN\RelationDiscriminator;

class Metadata extends SimpleMetadata implements MetadataInterface
{
    /**
     * Tuple constructor.
     *
     * @param string $relation
     */
    public function __construct($relation)
    {
        if (!is_a($relation, RelationInterface::class, true)) {
            throw new \InvalidArgumentException('cannot create map with a invalid relation class');
        }

        parent::__construct($relation);
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return call_user_func(array($this->relation, 'getTarget'));
    }
}