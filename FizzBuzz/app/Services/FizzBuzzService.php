<?php

namespace App\Services;

class FizzBuzzService
{
    private array $fizzNumbers = [
        15 => 'FizzBuzz',
        3 => 'Fizz',
        5 => 'Buzz',
    ];

    public function displayFizzBuzzNumbers(int $number = null): array
    {
        $results = [];

        // Check if parameter is provided if not than fast return, so we don't get errors
        if (!$number) {
            return $results;
        }

        for($i = 1; $i < $number + 1; $i++) {
            $results[] = $this->isFizzBuzz($i);
        }

        return $results;
    }

    private function isFizzBuzz(int $number): int|string
    {
        foreach ($this->fizzNumbers as $key => $value) {
            if ($number % $key == 0) {
                return $value;
            }
        }

        return $number;
    }
}
