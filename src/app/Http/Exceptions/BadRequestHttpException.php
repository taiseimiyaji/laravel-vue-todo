<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

final class BadRequestHttpException extends HttpException
{
    /**
     * @param string $detail
     * @param string $title
     * @param int $code
     */
    public function __construct(string $detail = '', string $title = 'Bad Request.', int $code = 400)
    {
        parent::__construct($code, $detail, $title);
    }
}
