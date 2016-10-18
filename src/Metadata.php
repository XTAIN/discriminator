<?php

namespace XTAIN\RelationDiscriminator;

class Metadata implements MetadataInterface
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
        if (!is_subclass_of($relation, RelationInterface::class)) {
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

    /**
     * @return string
     */
    public function getTarget()
    {
        return call_user_func(array($this->relation, 'getTarget'));
    }
}