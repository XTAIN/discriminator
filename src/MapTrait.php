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

    /**
     * @param string|object $item
     *
     * @return bool
     */
    public static function isValidRelation($item)
    {
        return is_subclass_of($item, static::getParent());
    }

    /**
     * @param string|object $item
     *
     * @return bool
     */
    public function hasRelation($item)
    {
        if (is_object($item)) {
            $item = get_class($item);
        }

        return $this->collection->has($item);
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
            if (is_subclass_of($target, $metadata->getTarget())) {
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
     * @param string|object $item
     *
     * @return MetadataInterface
     */
    public function getMetadataByItem($item)
    {
        if (is_object($item)) {
            $item = get_class($item);
        }

        if (!$this->isValidRelation($item)) {
            throw new \InvalidArgumentException(sprintf(
                "Object of type %s is not supported",
                $item
            ));
        }

        return MetadataFactory::create($item);
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
            if (is_subclass_of($target, $metadata->getTarget())) {
                return $metadata;
            }
        }

        throw new \InvalidArgumentException(sprintf(
            "Object of type %s is not supported",
            $target
        ));
    }

    /**
     * @param string|object $item
     *
     * @return string
     */
    public function getTarget($item)
    {
        return $this->getMetadataByItem($item)->getTarget();
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