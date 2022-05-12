<?php
declare(strict_types=1);

namespace Tests\TestHelper;

class FakeString
{
    public static function makeString(int $length, $baseChars=[]): string
    {
        $fakeString = '';
        $baseChars = count($baseChars) > 0
            ? $baseChars
            : ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        for ($i = 0; $i < $length; $i++) {
            $fakeString .= $baseChars[mt_rand(0, count($baseChars) - 1)];
        }
        return $fakeString;
    }
}
