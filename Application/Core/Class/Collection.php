<?php

namespace Core;

/**
 * Class Collection
 * @package Core
 */

class Collection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $items = array();

    /**
     * @var int
     */
    private $count = 0;

    /**
     * @param $item
     * @param null $key
     * @throws \Exception
     */
    public function addItem($item, $key = null)
    {
        if ($key == null) {
            $this->items[$this->count++] = $item;
        } else {
            if (isset($this->items[$key])) {
                throw new \Exception("Key $key already in use.");
            } else {
                $this->count++;
                $this->items[$key] = $item;
            }
        }
    }

    /**
     * @param $key
     * @throws \Exception
     */
    public function deleteItem($key)
    {
        if ($this->keyExists($key)) {
            unset($this->items[$key]);
            $this->count--;
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public function getItem($key)
    {
        if ($this->keyExists($key)) {
            return $this->items[$key];
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * Get array $items
     * Input: empty
     * Output: array of objects
     **/
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * Get length of array $items
     * Input: empty
     * Output: integer
     **/
    public function length()
    {
        return count($this->items);
    }

    /**
     * @param $key
     * @return bool
     */
    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
