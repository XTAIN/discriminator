<?php

namespace XTAIN\RelationDiscriminator;

class MapRegistry implements MapRegistryInterface
{
    /**
     * @var MapInterface[]
     */
    protected $relationMaps;

    /**
     * DiscriminatorListener constructor.
     *
     * @param MapInterface[] $relationMaps
     */
    public function __construct(array $relationMaps)
    {
        $this->relationMaps = $relationMaps;
    }

    /**
     * @param string $class
     *
     * @return null|MapInterface
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
}