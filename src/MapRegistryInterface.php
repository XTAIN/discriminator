<?php

namespace XTAIN\RelationDiscriminator;

interface MapRegistryInterface
{
    /**
     * @param string $class
     *
     * @return null|MapInterface
     */
    public function findMapByParent($class);
}