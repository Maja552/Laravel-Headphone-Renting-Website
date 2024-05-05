<?php

namespace App\Http\Services\Renting;

class RentingService
{
    const RENTING_KEY = 'renting';

    public function access() {
        return $this->get();
    }

    protected function get(): array
    {
        return request()->session()->get(self::RENTING_KEY, []);
    }

    public function itemsCount(): int
    {
        return count($this->get());
    }

    public function set(array $items): void
    {
        request()->session()->put(self::RENTING_KEY, $items);
    }

    public function cancel(): void
    {
        request()->session()->forget(self::RENTING_KEY);
    }

    public function clear(): array
    {
        request()->session()->forget(self::RENTING_KEY);
        return [];
    }

    public function add(int $id): array
    {
        $items = $this->get();

        $items[$id] = $id;
        $this->set($items);

        return $items;
    }

    public function remove(int $id): array
    {
        $items = $this->get();

        $items[$id] = null;
        unset($items[$id]);
        $this->set($items);

        return $items;
    }
}
