<?php
declare(strict_types=1);

namespace App\Adapters\Task\Query\GetAllStatus;

use App\Models\Status;
use Todo\Task\Query\StatusReadModel;
use Todo\Task\Query\GetAllStatus\GetAllStatusInterface;

/**
 * ステータス取得用ユースケース
 */
class GetAllStatus implements GetAllStatusInterface
{
    /**
     * @var Status
     */
    private Status $status;

    /**
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return array<StatusReadModel>
     */
    public function process(): array
    {
        $statusModel = $this->status->newQuery()->get();

        return $statusModel->map(function (Status $status) {
            return new StatusReadModel(
                $status->getAttribute('id'),
                $status->getAttribute('name')
            );
        })->toArray();
    }
}
