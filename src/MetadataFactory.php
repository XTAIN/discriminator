<?php

namespace XTAIN\RelationDiscriminator;

class MetadataFactory
{
    /**
     * @param string $relation
     *
     * @return Metadata|SimpleMetadata
     */
    public static function create($relation)
    {
        static $instances;

        if (!isset($instances)) {
            $instances = array();
        }

        if (isset($instances[$relation])) {
            return $instances[$relation];
        }

        if (is_a($relation, SimpleRelationInterface::class, true) && !is_a($relation, RelationInterface::class, true)) {
            return $instances[$relation] = new SimpleMetadata($relation);
        } else {
            return $instances[$relation] = new Metadata($relation);
        }
    }
}