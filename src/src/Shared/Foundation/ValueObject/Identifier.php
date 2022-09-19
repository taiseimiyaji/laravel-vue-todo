<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

/**
 * ULID形式のIDを実装するための基底抽象クラス
 */
abstract class Identifier
{
    public const ULID_LENGTH = 26;

    /**
     * @var string
     */
    private string $id;

    /**
     * @param string $value
     * @return void
     */
    abstract protected function validate(string $value): void;

    /**
     * ULIDの仕様に一致しているかを判定する
     * @param $value
     * @return bool
     */
    public function validateForUlid($value): bool
    {
        if(self::ULID_LENGTH !== mb_strlen($value)){
            return false;
        }
        if (26 !== strspn($value, '0123456789ABCDEFGHJKMNPQRSTVWXYZabcdefghjkmnpqrstvwxyz')) {
            return false;
        }
        return $value[0] <= '7';
    }

    /**
     * @param Identifier $id
     * @return bool
     */
    public function equals(self $id): bool
    {
        return $this->id === (string)$id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
