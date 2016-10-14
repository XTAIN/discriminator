<?php
/**
 * @author Maximilian Ruta <mr@xtain.net>
 */

namespace XTAIN\Type\RelationDiscriminator;

interface RelationInterface
{
    /**
     * @return string
     *
     * @author Maximilian Ruta <mr@xtain.net>
     */
    public static function getTarget();
}