<?php
interface ListInterface extends CollectionInterface {
    public function get(int $index);
    public function set(int $index, $value): void;
}
