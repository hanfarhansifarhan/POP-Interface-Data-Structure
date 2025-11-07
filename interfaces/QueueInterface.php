<?php
interface QueueInterface extends CollectionInterface {
    public function enqueue($item): void;
    public function dequeue();
}
