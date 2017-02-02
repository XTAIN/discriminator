<?php

namespace XTAIN\RelationDiscriminator;

interface MetadataInterface extends SimpleMetadataInterface
{
    /**
     * @return string
     */
    public function getTarget();
}