<?php

namespace XTAIN\RelationDiscriminator;

class MetadataFactory
{
    /**
     * @param string $relation
     *
     * @return Metadata
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

        return $instances[$relation] = new Metadata($relation);
    }
}