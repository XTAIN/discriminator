<?php

namespace XTAIN\RelationDiscriminator;

interface SimpleSingletonMapInterface extends SimpleMapInterface
{
    /**
     * @return SimpleSingletonMapInterface
     */
    public static function getInstance();
}