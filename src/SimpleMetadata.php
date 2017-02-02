<?php

namespace XTAIN\RelationDiscriminator;

class SimpleMetadata implements SimpleMetadataInterface
{
    /**
     * @var string
     */
    protected $relation;

    /**
     * Tuple constructor.
     *
     * @param string $relation
     */
    public function __construct($relation)
    {
        if (!is_a($relation, SimpleRelationInterface::class, true)) {
            throw new \InvalidArgumentException('cannot create map with a invalid relation class');
        }

        $this->relation = $relation;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return call_user_func(array($this->relation, 'getType'));
    }

    /**
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }
}