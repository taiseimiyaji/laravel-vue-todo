<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetAllStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Query\GetAllStatus\GetAllStatusInterface;
use Todo\Task\Query\StatusReadModel;

class GetAllStatusAction extends Controller
{
    /**
     * @var GetAllStatusInterface
     */
    private GetAllStatusInterface $getAllStatus;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param GetAllStatusInterface $getAllStatus
     * @param LoggerInterface $logger
     */
    public function __construct(
        GetAllStatusInterface $getAllStatus,
        LoggerInterface $logger
    )
    {
        $this->getAllStatus = $getAllStatus;
        $this->logger = $logger;
    }

    /**
     * @param GetAllStatusRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function __invoke(GetAllStatusRequest $request): JsonResponse
    {
        try {
            $status = $this->getAllStatus->process();
        } catch (Throwable $e) {
            $this->logger->error('Read status error');
            throw $e;
        }

        return Response::json(
            array_map(static function (StatusReadModel $readModel): array {
                return [
                    'id' => $readModel->id(),
                    'name' => $readModel->name()
                ];
            }, $status)
        );
    }
}
