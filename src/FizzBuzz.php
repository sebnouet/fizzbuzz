<?php

declare(strict_types=1);

namespace FizzBuzz;

use Generator;
use InvalidArgumentException;

/**
 * Converts numbers into words according to divisibility rules. When no rule matches, the number itself is returned.
 */
final readonly class FizzBuzz
{
    /** @var array<int, non-empty-string> divisor => word, concatenated in this order */
    private const array RULES = [3 => 'Fizz', 5 => 'Buzz'];

    /**
     * Yields the result for each number from 1 to $n.
     * @return Generator<int, string> number => result
     */
    public function generate(int $n): Generator
    {
        if ($n < 1) {
            throw new InvalidArgumentException(
                sprintf('N must be greater than or equal to 1, got %d.', $n)
            );
        }

        for ($i = 1; $i <= $n; ++$i) {
            yield $i => $this->convert($i);
        }
    }

    /**
     * Applies self::RULES to the given number.
     */
    private function convert(int $number): string
    {
        $result = '';

        foreach (self::RULES as $divisor => $word) {
            if ($number % $divisor === 0) {
                $result .= $word;
            }
        }

        return $result === '' ? (string) $number : $result;
    }
}
