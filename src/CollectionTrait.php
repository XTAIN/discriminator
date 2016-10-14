<?php

namespace XTAIN\RelationDiscriminator;

trait CollectionTrait
{
    /**
     * @var array
     */
    protected $items;

    /**
     * CollectionTrait constructor.
     */
    public function __construct()
    {
        $this->items = array();
    }

    /**
     * @param string $item
     *
     * @return bool
     */
    public function has($item)
    {
        return in_array($item, $this->items);
    }

    /**
     * @param string $item
     */
    public function push($item)
    {
        $this->items[] = $item;
    }

    /**
     * @return string[]
     */
    public function items()
    {
        return $this->items;
    }
}