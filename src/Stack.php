<?php
namespace Structures;

use Interfaces\CollectionInterface;

class Stack implements CollectionInterface {

    private array $stack = [];

    public function add($item) {   // push alias
        $this->stack[] = $item;
    }

    public function pop() {
        return array_pop($this->stack);
    }

    public function peek() {
        return end($this->stack);
    }

    public function remove($item) {
        $this->stack = array_values(array_filter(
            $this->stack,
            fn($i) => $i !== $item
        ));
    }

    public function size(): int {
        return count($this->stack);
    }

    public function isEmpty(): bool {
        return empty($this->stack);
    }
}
