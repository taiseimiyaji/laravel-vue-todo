<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\StatusName;

/**
 * ステータスエンティティ
 *
 * タスクに対して1対1の関係性
 */
class Status
{
    /**
     * @var StatusIdentifier
     */
    private StatusIdentifier $id;

    /**
     * @var StatusName
     */
    private StatusName $name;

    /**
     * デフォルトのステータス。
     *
     * @todo ValueObject内にもつかFactoryにもつか検討
     */
    public const STATUS_DEFAULT = 'ToDo';

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = new StatusIdentifier($id);
        $this->name = new StatusName($name);
    }

    /**
     * @return StatusIdentifier
     */
    public function id(): StatusIdentifier
    {
        return $this->id;
    }

    /**
     * @return StatusName
     */
    public function name(): StatusName
    {
        return $this->name;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return
            [
                'status_id' => (string)$this->id(),
                'status_name' => (string)$this->name()
            ];
    }
}
