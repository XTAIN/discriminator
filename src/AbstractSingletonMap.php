<?php

namespace XTAIN\RelationDiscriminator;

abstract class AbstractSingletonMap implements SingletonMapInterface
{
    use MapTrait;
    use SingletonMapTrait;
}
