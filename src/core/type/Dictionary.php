<?php
declare(strict_types=1);

namespace src\core\type;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Dictionary implements IteratorAggregate, ArrayAccess, Countable {

    private array $container;


    public function __construct(array $container = []) {
        $this->container = $container;
    }

    public function getIterator():Traversable {
        return new ArrayIterator($this);
    }

    public function offsetExists($offset): bool {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset): ?bool {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetSet($offset, $value): void {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function count():int {
     return count($this->container);
    }
}