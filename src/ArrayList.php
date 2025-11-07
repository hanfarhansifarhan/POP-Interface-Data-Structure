<?php
namespace Structures;

use Interfaces\ListInterface;
use Interfaces\IteratorInterface;

class ArrayList implements ListInterface, IteratorInterface {

    private array $items = [];
    private int $cursor = 0;

    public function add($item) {
        $this->items[] = $item;
    }

    public function remove($item) {
        $this->items = array_values(array_filter(
            $this->items,
            fn($i) => $i !== $item
        ));
    }

    public function size(): int {
        return count($this->items);
    }

    public function isEmpty(): bool {
        return empty($this->items);
    }

    public function get(int $index) {
        return $this->items[$index] ?? null;
    }

    public function set(int $index, $value) {
        if (isset($this->items[$index])) {
            $this->items[$index] = $value;
        }
    }

    public function removeAt(int $index) {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
    }

    // Iterator
    public function hasNext(): bool {
        return $this->cursor < count($this->items);
    }

    public function next() {
        return $this->items[$this->cursor++] ?? null;
    }
}
