<?php

namespace XTAIN\RelationDiscriminator;

interface SimpleMetadataInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getRelation();
}