<?php
namespace Structures;

use Interfaces\QueueInterface;

class Queue implements QueueInterface {

    private array $queue = [];

    public function add($item) {
        $this->enqueue($item);
    }

    public function enqueue($item) {
        $this->queue[] = $item;
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function peek() {
        return $this->queue[0] ?? null;
    }

    public function remove($item) {
        $this->queue = array_values(array_filter(
            $this->queue,
            fn($i) => $i !== $item
        ));
    }

    public function size(): int {
        return count($this->queue);
    }

    public function isEmpty(): bool {
        return empty($this->queue);
    }
}
