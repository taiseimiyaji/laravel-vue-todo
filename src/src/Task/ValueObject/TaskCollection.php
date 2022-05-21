<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

class TaskCollection implements Countable, IteratorAggregate
{
    private array $items;

    public function __construct(array $items = [])
    {
        $this->validate($items);
        $this->items = $items;
    }

    public function toArray(): array
    {
        $results = [];
        foreach ($this->items as $item) {
            $results[] = $item->toArray();
        }
        return $results;
    }

    public function addTask(Task $item): void
    {
        $this->item[] = $item;
    }

    public static function fromArray(array $items): self
    {
        $array = [];
        foreach($items as $item) {
            $array[] = new Task(
                (int)$item['task_id'],
                new TaskName($item['task_name']),
                (string)$item['task_label'],
                (int)$item['task_cost'],
                (string)$item['task_deadline'],
                new TaskDetail((string)$item['task_detail']),
                (string)$item['task_todos']
            );
        }
        return new self($array);
    }

    public function validate(array $items): void
    {
        foreach($items as $item){
            if(!$item instanceof Task){
                throw new InvalidArgumentException('item must be Task type');
            }
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
