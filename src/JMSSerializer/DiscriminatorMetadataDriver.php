<?php

namespace XTAIN\RelationDiscriminator\JMSSerializer;

use JMS\Serializer\Metadata\ClassMetadata;
use Metadata\Driver\DriverInterface;
use XTAIN\RelationDiscriminator\MapRegistryInterface;

class DiscriminatorMetadataDriver implements DriverInterface
{
    /**
     * @var MapRegistryInterface
     */
    protected $mapRegistry;

    /**
     * @var DriverInterface
     */
    protected $delegate;

    /**
     * DiscriminatorMetadataDriver constructor.
     *
     * @param DriverInterface $delegate
     */
    public function __construct(
        DriverInterface $delegate,
        MapRegistryInterface $mapRegistry
    ) {
        $this->delegate = $delegate;
        $this->mapRegistry = $mapRegistry;
    }

    /**
     * @param \ReflectionClass $class
     *
     * @return ClassMetadata
     */
    public function loadMetadataForClass(\ReflectionClass $class)
    {
        /** @var $classMetadata ClassMetadata */
        $classMetadata = $this->delegate->loadMetadataForClass($class);

        $map = $this->mapRegistry->findMapByParent($class->getName());
        if ($map !== null) {
            $classMetadata->discriminatorMap = $map->getDiscriminatorMap();
        }

        return $classMetadata;
    }
}
