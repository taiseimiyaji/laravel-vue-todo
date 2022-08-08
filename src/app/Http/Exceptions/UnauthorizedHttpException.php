<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

final class UnauthorizedHttpException extends HttpException
{
    /**
     * @param string $detail
     * @param string $title
     * @param int $code
     */
    public function __construct(string $detail = '', string $title = 'Unauthorized.', int $code = 401)
    {
        parent::__construct($code, $detail, $title);
    }
}

