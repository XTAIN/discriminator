<?php

namespace XTAIN\RelationDiscriminator;

trait SingletonMapTrait
{
    /**
     * @return static
     */
    public static function getInstance()
    {
        static $instance;

        if (!isset($instance)) {
            $instance = new static();
        }

        return $instance;
    }
}