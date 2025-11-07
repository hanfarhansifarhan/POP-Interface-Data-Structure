<?php
namespace Structures;

use Interfaces\MapInterface;

class HashMap implements MapInterface {

    private array $container = [];

    public function put($key, $value) {
        $this->container[$key] = $value;
    }

    public function get($key) {
        return $this->container[$key] ?? null;
    }

    public function remove($key) {
        unset($this->container[$key]);
    }

    public function containsKey($key): bool {
        return array_key_exists($key, $this->container);
    }

    public function size(): int {
        return count($this->container);
    }
}
