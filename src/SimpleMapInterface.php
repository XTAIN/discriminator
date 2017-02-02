<?php

namespace XTAIN\RelationDiscriminator;

interface SimpleMapInterface
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
     * @return SimpleMetadataInterface[]
     */
    public function getMetadatas();

    /**
     * @param string $type
     *
     * @return bool
     */
    public function hasType($type);

    /**
     * @param string $type
     *
     * @return SimpleMetadataInterface
     */
    public function getMetadataByType($type);

    /**
     * @param string|object $relation
     *
     * @return SimpleMetadataInterface
     */
    public function getMetadataByRelation($relation);

    /**
     * @return string[]
     */
    public function getDiscriminatorMap();

    /**
     * @param string $type
     *
     * @return string
     */
    public function getRelationByType($type);
}