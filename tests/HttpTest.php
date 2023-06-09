<?php
/**
 * @author      Pierre-Henry Soria <hi@ph7.me>
 * @license     MIT License
 */

declare(strict_types=1);

namespace PH7\PhpHttpResponseHeader\Tests;

use PH7\PhpHttpResponseHeader\Http;
use PHPUnit\Framework\TestCase;

final class HttpTest extends TestCase
{
    /**
     * @dataProvider validStatusCodesProvider
     */
    public function testValidStatusCode(int $validCode): void
    {
        $response = Http::getStatusCode($validCode);
        $this->assertIsString($response);
    }

    /**
     * @dataProvider invalidStatusCodesProvider
     */
    public function testInvalidStatusCode(int $invalidCode): void
    {
        $response = Http::getStatusCode($invalidCode);
        $this->assertFalse($response);
    }

    public static function validStatusCodesProvider(): array
    {
        return [
            [100],
            [101],
            [102],
            [103],
            [200],
            [201],
            [202],
            [203],
            [204],
            [205],
            [206],
            [207],
            [208],
            [226],
            [300],
            [301],
            [302],
            [303],
            [304],
            [305],
            [307],
            [308],
            [400],
            [401],
            [402],
            [403],
            [404],
            [405],
            [406],
            [407],
            [408],
            [409],
            [410],
            [411],
            [412],
            [413],
            [414],
            [415],
            [416],
            [417],
            [422],
            [423],
            [424],
            [425],
            [426],
            [428],
            [429],
            [431],
            [500],
            [501],
            [502],
            [503],
            [504],
            [505],
            [506],
            [507],
            [508],
            [509],
            [510],
            [511],
            [598],
            [599]
        ];
    }

    public static function invalidStatusCodesProvider(): array
    {
        return [
            [600, 1000, 0, 1, 1010]
        ];
    }
}