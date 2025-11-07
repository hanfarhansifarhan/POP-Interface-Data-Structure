<?php
namespace Structures;

use Interfaces\ListInterface;
use Interfaces\IteratorInterface;

class Node {
    public $value;
    public ?Node $next = null;

    public function __construct($value) {
        $this->value = $value;
    }
}

class LinkedList implements ListInterface, IteratorInterface {

    private ?Node $head = null;
    private ?Node $pointer = null;

    public function add($item) {
        $node = new Node($item);

        if ($this->head === null) {
            $this->head = $node;
            return;
        }

        $temp = $this->head;
        while ($temp->next !== null) {
            $temp = $temp->next;
        }

        $temp->next = $node;
    }

    public function remove($item) {
        $prev = null;
        $temp = $this->head;

        while ($temp !== null) {
            if ($temp->value === $item) {
                if ($prev === null) {
                    $this->head = $temp->next;
                } else {
                    $prev->next = $temp->next;
                }
                return;
            }
            $prev = $temp;
            $temp = $temp->next;
        }
    }

    public function size(): int {
        $count = 0;
        $temp = $this->head;

        while ($temp !== null) {
            $count++;
            $temp = $temp->next;
        }

        return $count;
    }

    public function isEmpty(): bool {
        return $this->head === null;
    }

    public function get(int $index) {
        $temp = $this->head;
        $i = 0;

        while ($temp !== null) {
            if ($i === $index) {
                return $temp->value;
            }
            $temp = $temp->next;
            $i++;
        }

        return null;
    }

    public function set(int $index, $value) {
        $temp = $this->head;
        $i = 0;

        while ($temp !== null) {
            if ($i === $index) {
                $temp->value = $value;
                return;
            }
            $temp = $temp->next;
            $i++;
        }
    }

    public function removeAt(int $index) {
        if ($index === 0 && $this->head !== null) {
            $this->head = $this->head->next;
            return;
        }

        $prev = null;
        $temp = $this->head;
        $i = 0;

        while ($temp !== null) {
            if ($i === $index) {
                $prev->next = $temp->next;
                return;
            }
            $prev = $temp;
            $temp = $temp->next;
            $i++;
        }
    }

    // Iterator
    public function hasNext(): bool {
        if ($this->pointer === null) {
            $this->pointer = $this->head;
        } else {
            $this->pointer = $this->pointer->next;
        }

        return $this->pointer !== null;
    }

    public function next() {
        return $this->pointer->value;
    }
}
