<?php

namespace XTAIN\RelationDiscriminator;

interface MapRegistryInterface
{
    /**
     * @param string $class
     *
     * @return null|SimpleMapInterface
     */
    public function findMapByParent($class);

    /**
     * @param string $class
     *
     * @return null|SimpleMapInterface
     */
    public function findMapByParentOrChild($class);
}