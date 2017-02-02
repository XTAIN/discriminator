<?php

namespace XTAIN\RelationDiscriminator;

interface MapInterface extends SimpleMapInterface
{
    /**
     * @param string $type
     *
     * @return MetadataInterface
     */
    public function getMetadataByType($type);

    /**
     * @param string|object $relation
     *
     * @return MetadataInterface
     */
    public function getMetadataByRelation($relation);

    /**
     * @return MetadataInterface[]
     */
    public function getMetadatas();

    /**
     * @param string $type
     *
     * @return string
     */
    public function getTargetByType($type);

    /**
     * @param string|object $target
     *
     * @return string
     */
    public function getTarget($target);

    /**
     * @param string|object $target
     *
     * @return string
     */
    public function getRelation($target);

    /**
     * @param string|object $target
     *
     * @return MetadataInterface
     */
    public function getMetadataByTarget($target);

    /**
     * @param string|object $target
     *
     * @return bool
     */
    public function hasTarget($target);

}