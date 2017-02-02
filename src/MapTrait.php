<?php

namespace XTAIN\RelationDiscriminator;

trait MapTrait
{
    use SimpleMapTrait;

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
}
