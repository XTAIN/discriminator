<?php

namespace XTAIN\RelationDiscriminator;

interface RelationInterface
{
    /**
     * @return string
     */
    public static function getTarget();

    /**
     * @return string
     */
    public static function getType();
}