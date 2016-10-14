<?php

namespace XTAIN\RelationDiscriminator;

interface MapInterface
{
    /**
     * @return string
     */
    public static function getParent();

    /**
     * @param string|object $item
     *
     * @return bool
     */
    public static function isValidRelation($item);

    /**
     * @param string|object $item
     *
     * @return bool
     */
    public function hasRelation($item);

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
     * @param string|object $item
     *
     * @return MetadataInterface
     */
    public function getMetadataByItem($item);

    /**
     * @param string|object $target
     *
     * @return MetadataInterface
     */
    public function getMetadataByTarget($target);

    /**
     * @param string|object $item
     *
     * @return string
     */
    public function getTarget($item);

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