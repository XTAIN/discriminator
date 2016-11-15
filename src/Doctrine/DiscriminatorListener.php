<?php

namespace XTAIN\RelationDiscriminator\Doctrine;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use XTAIN\RelationDiscriminator\MapRegistryInterface;

class DiscriminatorListener
{
    /**
     * @var MapRegistryInterface
     */
    protected $mapRegistry;

    /**
     * DiscriminatorListener constructor.
     *
     * @param MapRegistryInterface $mapRegistry
     */
    public function __construct(MapRegistryInterface $mapRegistry)
    {
        $this->mapRegistry = $mapRegistry;
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $event)
    {
        /** @var \Doctrine\ORM\Mapping\ClassMetadata $classMetadata */
        $classMetadata = $event->getClassMetadata();

        if (!$classMetadata->discriminatorColumn) {
            return;
        }

        $class = $classMetadata->getName();
        $driver = $event->getEntityManager()->getConfiguration()->getMetadataDriverImpl();

        $registry = $this->mapRegistry->findMapByParent($class);

        if (!$registry) {
            return;
        }

        $event->getClassMetadata()->discriminatorMap = $registry->getDiscriminatorMap();
    }
}
