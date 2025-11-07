<?php
interface MapInterface {
    public function put($key, $value): void;
    public function get($key);
    public function removeKey($key): void;
    public function keys(): array;
}
