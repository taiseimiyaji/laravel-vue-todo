<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

final class ForbiddenHttpException extends HttpException
{
    /**
     * @param string $detail
     * @param string $title
     * @param int $code
     */
    public function __construct(string $detail = '', string $title = 'Forbidden.', int $code = 403)
    {
        parent::__construct($code, $detail, $title);
    }
}
