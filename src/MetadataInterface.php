<?php

namespace XTAIN\RelationDiscriminator;

interface MetadataInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getRelation();

    /**
     * @return string
     */
    public function getTarget();
}