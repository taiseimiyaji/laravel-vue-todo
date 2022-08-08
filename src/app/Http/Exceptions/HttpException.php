<?php
declare(strict_types=1);

namespace App\Http\Exceptions;

use Illuminate\Http\JsonResponse;
use RuntimeException;

/**
 * Httpエラーレスポンスの基底となるクラス。
 * RFC7807形式でレスポンスを返す。
 * @see https://tex2e.github.io/rfc-translater/html/rfc7807.html
 */
abstract class HttpException extends RuntimeException
{
    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $detail;

    public function __construct(
        int $statusCode,
        string $detail,
        string $title
    )
    {
        parent::__construct($title, $statusCode);
        $this->statusCode = $statusCode;
        $this->title = $title;
        $this->detail = $detail;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return JsonResponse
     */
    public function makeHttpErrorResponse(): JsonResponse
    {
        return response()->json([
            'title' => $this->title,
            'detail' => $this->detail
        ], $this->statusCode, [
            'Content-Type' => 'application/problem+json',
        ]);
    }
}

