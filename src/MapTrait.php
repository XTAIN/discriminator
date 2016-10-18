<?php

namespace XTAIN\RelationDiscriminator;

trait MapTrait
{
    /**
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * RegistryTrait constructor.
     */
    public function __construct()
    {
        $this->collection = new Collection();
    }

    protected static function isInstanceOf($object, $className)
    {
        if (is_object($object)) {
            $object = get_class($object);
        }

        if (is_object($className)) {
            $className = get_class($className);
        }

        return $object === $className || is_subclass_of($object, $className);
    }

    /**
     * @param string|object $relation
     *
     * @return bool
     */
    public static function isValidRelation($relation)
    {
        return self::isInstanceOf($relation, static::getParent());
    }

    /**
     * @param string|object $relation
     *
     * @return bool
     */
    public function hasRelation($relation)
    {
        if (is_object($relation)) {
            $relation = get_class($relation);
        }

        return $this->collection->has($relation);
    }

    /**
     * @return \string[]
     */
    public function getRelations()
    {
        return $this->collection->items();
    }

    /**
     * @param string|array $items
     */
    public function register($items)
    {
        if (!is_array($items)) {
            $items = array($items);
        }

        foreach ($items as $item) {
            if (!$this->isValidRelation($item)) {
                throw new \InvalidArgumentException(sprintf(
                    'Try to register %s to registry which',
                    $item
                ));
            }

            $this->collection->push($item);
        }
    }

    /**
     * @return MetadataInterface[]
     */
    public function getMetadatas()
    {
        $metadatas = array();

        foreach ($this->collection->items() as $item) {
            $metadatas[] = MetadataFactory::create($item);
        }

        return $metadatas;
    }

    /**
     * @param string|object $target
     *
     * @return bool
     */
    public function hasTarget($target)
    {
        if (is_object($target)) {
            $target = get_class($target);
        }

        foreach ($this->getMetadatas() as $metadata) {
            if (self::isInstanceOf($target, $metadata->getTarget())) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public function hasType($type)
    {
        foreach ($this->getMetadatas() as $metadata) {
            if ($type == $metadata->getType()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $type
     *
     * @return MetadataInterface
     */
    public function getMetadataByType($type)
    {
        foreach ($this->getMetadatas() as $metadata) {
            if ($type == $metadata->getType()) {
                return $metadata;
            }
        }

        throw new \InvalidArgumentException(sprintf(
            "Type %s is not supported",
            $type
        ));
    }

    /**
     * @param string|object $relation
     *
     * @return MetadataInterface
     */
    public function getMetadataByRelation($relation)
    {
        if (is_object($relation)) {
            $relation = get_class($relation);
        }

        if (!$this->isValidRelation($relation)) {
            throw new \InvalidArgumentException(sprintf(
                "Object of type %s is not supported",
                $relation
            ));
        }

        return MetadataFactory::create($relation);
    }

    /**
     * @param string|object $target
     *
     * @return MetadataInterface
     */
    public function getMetadataByTarget($target)
    {
        if (is_object($target)) {
            $target = get_class($target);
        }

        foreach ($this->getMetadatas() as $metadata) {
            if (self::isInstanceOf($target, $metadata->getTarget())) {
                return $metadata;
            }
        }

        throw new \InvalidArgumentException(sprintf(
            "Object of type %s is not supported",
            $target
        ));
    }

    /**
     * @return string[]
     */
    public function getDiscriminatorMap()
    {
        $map = array();

        foreach ($this->getMetadatas() as $metadata) {
            $map[$metadata->getType()] = $metadata->getRelation();
        }

        return $map;
    }

    /**
     * @param string|object $target
     *
     * @return string
     */
    public function getTarget($target)
    {
        return $this->getMetadataByRelation($target)->getTarget();
    }

    /**
     * @param string|object $target
     *
     * @return string
     */
    public function getRelation($target)
    {
        return $this->getMetadataByTarget($target)->getRelation();
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function getRelationByType($type)
    {
        return $this->getMetadataByType($type)->getRelation();
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function getTargetByType($type)
    {
        return $this->getMetadataByType($type)->getTarget();
    }
}