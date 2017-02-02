<?php

namespace XTAIN\RelationDiscriminator;

interface RelationInterface extends SimpleRelationInterface
{
    /**
     * @return string
     */
    public static function getTarget();
}