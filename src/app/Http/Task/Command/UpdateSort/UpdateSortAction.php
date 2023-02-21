<?php
declare(strict_types=1);

namespace App\Http\Task\Command\UpdateSort;

use App\Http\Controllers\Controller;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Sort\SortTaskCollection;
use Todo\Task\Sort\UpdateSort\UpdateSortInput;
use Todo\Task\Sort\UpdateSort\UpdateSortInterface;

class UpdateSortAction extends Controller
{
    /**
     * @var UpdateSortInterface
     */
    private UpdateSortInterface $updateSort;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param UpdateSortInterface $updateSort
     * @param LoggerInterface $logger
     */
    public function __construct(
        UpdateSortInterface $updateSort,
        LoggerInterface $logger
    )
    {
        $this->updateSort = $updateSort;
        $this->logger = $logger;
    }

    /**
     * @param UpdateSortRequest $request
     * @return void
     * @throws Throwable
     */
    public function __invoke(UpdateSortRequest $request)
    {
        try {
            $input = new UpdateSortInput(SortTaskCollection::fromArray($request->tasks()));
            $this->updateSort->process($input);
        } catch (Throwable $e) {
            $this->logger->error((string)$e);
            throw $e;
        }
    }
}
