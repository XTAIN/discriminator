<?php

namespace XTAIN\RelationDiscriminator;

abstract class AbstractSimpleSingletonMap implements SimpleSingletonMapInterface
{
    use SimpleMapTrait;
    use SingletonMapTrait;
}
