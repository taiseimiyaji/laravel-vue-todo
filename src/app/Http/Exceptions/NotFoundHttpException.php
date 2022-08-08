<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

class NotFoundHttpException extends HttpException
{
    /**
     * @param string $detail
     * @param string $title
     * @param int $code
     */
    public function __construct(string $detail = '', string $title = 'Not Found.', int $code = 404)
    {
        parent::__construct($code, $detail, $title);
    }
}
