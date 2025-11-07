<?php
interface CollectionInterface {
    public function add($item): void;
    public function remove($item): void;
    public function size(): int;
    public function isEmpty(): bool;
}
