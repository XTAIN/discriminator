<?php

namespace XTAIN\RelationDiscriminator;

interface SimpleRelationInterface
{
    /**
     * @return string
     */
    public static function getType();
}