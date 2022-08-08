<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

class InternalServerErrorHttpException extends HttpException
{
    /**
     * @param string $detail
     * @param string $title
     * @param int $code
     */
    public function __construct(string $detail = '', string $title = 'Internal Server Error.', int $code = 500)
    {
        parent::__construct($code, $detail, $title);
    }
}
