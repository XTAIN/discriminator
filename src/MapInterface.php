<?php

namespace XTAIN\RelationDiscriminator;

interface MapInterface
{
    /**
     * @return string
     */
    public static function getParent();

    /**
     * @param string|object $relation
     *
     * @return bool
     */
    public static function isValidRelation($relation);

    /**
     * @param string|object $relation
     *
     * @return bool
     */
    public function hasRelation($relation);

    /**
     * @return \string[]
     */
    public function getRelations();

    /**
     * @param string|array $items
     */
    public function register($items);

    /**
     * @return MetadataInterface[]
     */
    public function getMetadatas();

    /**
     * @param string|object $target
     *
     * @return bool
     */
    public function hasTarget($target);

    /**
     * @param string $type
     *
     * @return bool
     */
    public function hasType($type);

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
     * @param string|object $target
     *
     * @return MetadataInterface
     */
    public function getMetadataByTarget($target);

    /**
     * @return string[]
     */
    public function getDiscriminatorMap();

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
     * @param string $type
     *
     * @return string
     */
    public function getRelationByType($type);

    /**
     * @param string $type
     *
     * @return string
     */
    public function getTargetByType($type);
}