<?php

namespace XTAIN\Type\RelationDiscriminator\Doctrine;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use XTAIN\RelationDiscriminator\RelationRegistryInterface;

class DiscriminatorListener
{
    /**
     * @var RelationRegistryInterface[]
     */
    protected $relationRegistries;

    /**
     * DiscriminatorListener constructor.
     *
     * @param RelationRegistryInterface[] $relationRegistries
     */
    public function __construct(array $relationRegistries)
    {
        $this->relationRegistries = $relationRegistries;
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $event)
    {
        /** @var \Doctrine\ORM\Mapping\ClassMetadata $classMetadata */
        $classMetadata = $event->getClassMetadata();
        Debug::dump(get_class($classMetadata));
        Debug::dump($classMetadata);
        $class = $classMetadata->getName();
        $driver = $event->getEntityManager()->getConfiguration()->getMetadataDriverImpl();

        if ($classMetadata->discriminatorColumn) {

        }

        //
        // Is it DiscriminatorMap parent class?
        // DiscriminatorSubscriber::loadClassMetadata processes only parent classes
        //
        $registry = $this->findRegistry($class);

        if (!$registry) {
            return;
        }

        //
        // Register our discriminator class
        //
        //$this->discriminatorMaps[$class] = array();

        //
        // And find all subclasses for this parent class
        //
/*
        var_dump('load ' . $class);
        foreach ($driver->getAllClassNames() as $name) {
            var_dump($name);
            //if ($this->isDiscriminatorChild($class, $name)) {
            //    $this->discriminatorMaps[$class][] = $name;
            //}
        }
*/
    }

    /**
    * @param string $class
     *
    * @return bool
    */
   private function findRegistry($class)
   {
       foreach ($this->relationRegistries as $relationRegistry) {
           if (is_subclass_of($relationRegistry, $class)) {
               return $relationRegistry;
           }
       }

       return null;
   }

   /**
    * @param string $parent
    * @param string $class
    * @return bool
    */
   private function isDiscriminatorChild($parent, $class)
   {
       $reflectionClass = new \ReflectionClass($class);
       $parentClass = $reflectionClass->getParentClass();

       if ($parentClass === false) {
           return false;
       } elseif ($parentClass->getName() !== $parent) {
           return $this->isDiscriminatorChild($parentClass->getName(), $class);
       }

       if ($this->getAnnotation($reflectionClass, self::ANNOTATION_ENTRY)) {
           return true;
       }

       return false;
   }
}