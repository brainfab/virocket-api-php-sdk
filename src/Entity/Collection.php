<?php

namespace Brainfab\ViRocket\Entity;

use JMS\Serializer\Annotation as JMS;

class Collection extends Entity implements \Iterator, \Countable, \ArrayAccess
{
    /**
     * @var array
     * @JMS\Type("array")
     */
    protected $data;


    /**
     * Collection constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data[] = $data;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * @return int|null|string
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        $key = $this->key();
        return $key !== null && $key !== false;
    }

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}
