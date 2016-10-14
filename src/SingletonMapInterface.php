<?php

namespace XTAIN\RelationDiscriminator;

interface SingletonMapInterface extends MapInterface
{
    /**
     * @return SingletonMapInterface
     */
    public static function getInstance();
}