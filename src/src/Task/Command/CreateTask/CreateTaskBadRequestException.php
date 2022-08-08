<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CreateTaskBadRequestException extends BadRequestException
{
}
