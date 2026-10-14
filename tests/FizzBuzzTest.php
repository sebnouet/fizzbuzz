<?php

declare(strict_types=1);

namespace FizzBuzz\Tests;

use FizzBuzz\FizzBuzz;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

#[CoversClass(FizzBuzz::class)]
final class FizzBuzzTest extends TestCase
{
    public function testGeneratesFirstFifteenResults(): void
    {
        $expected = [
            1 => '1', '2', 'Fizz', '4', 'Buzz', 'Fizz', '7', '8',
            'Fizz', 'Buzz', '11', 'Fizz', '13', '14', 'FizzBuzz',
        ];

        self::assertSame($expected, iterator_to_array((new FizzBuzz())->generate(15)));
    }

    /**
     * @return iterable<string, array{int, string}>
     */
    public static function provideNumbers(): iterable
    {
        yield 'one' => [1, '1'];
        yield 'multiple of 3' => [9, 'Fizz'];
        yield 'multiple of 5' => [20, 'Buzz'];
        yield 'multiple of 3 and 5' => [30, 'FizzBuzz'];
        yield 'neither' => [98, '98'];
    }

    #[DataProvider('provideNumbers')]
    public function testConvertsNumber(int $number, string $expected): void
    {
        $results = iterator_to_array((new FizzBuzz())->generate($number));

        self::assertSame($expected, $results[$number]);
    }

    public function testGeneratesExactlyNResults(): void
    {
        self::assertCount(100, iterator_to_array((new FizzBuzz())->generate(100)));
    }

    public function testGeneratesSingleResultForOne(): void
    {
        self::assertSame([1 => '1'], iterator_to_array((new FizzBuzz())->generate(1)));
    }

    #[TestWith([0])]
    #[TestWith([-1])]
    public function testRejectsLowerThanOne(int $n): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new FizzBuzz())->generate($n)->current();
    }
}
