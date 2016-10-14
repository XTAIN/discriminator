<?php

namespace XTAIN\RelationDiscriminator;

interface CollectionInterface
{
    /**
     * @param string $item
     *
     * @return bool
     */
    public function has($item);

    /**
     * @param string $item
     */
    public function push($item);

    /**
     * @return string[]
     */
    public function items();
}