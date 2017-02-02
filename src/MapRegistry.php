<?php

namespace XTAIN\RelationDiscriminator;

class MapRegistry implements MapRegistryInterface
{
    /**
     * @var SimpleMapInterface[]
     */
    protected $relationMaps;

    /**
     * DiscriminatorListener constructor.
     *
     * @param SimpleMapInterface[] $relationMaps
     */
    public function __construct(array $relationMaps)
    {
        $this->relationMaps = $relationMaps;
    }

    /**
     * @param string $class
     *
     * @return null|SimpleMapInterface
     */
    public function findMapByParent($class)
    {
        foreach ($this->relationMaps as $relationMap) {
            if ($relationMap->getParent() == $class) {
                return $relationMap;
            }
        }

        return null;
    }

    /**
     * @param string $class
     *
     * @return null|SimpleMapInterface
     */
    public function findMapByParentOrChild($class)
    {
        foreach ($this->relationMaps as $relationMap) {
            if (is_a($class, $relationMap->getParent(), true)) {
                return $relationMap;
            }
        }

        return null;
    }
}