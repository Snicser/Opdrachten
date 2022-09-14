<?php

namespace App\Services;

use InvalidArgumentException;

class NumberService
{
    public function generateList(int $numberUpToGenerate, int $numberOfList): array
    {
        if ($numberOfList > $numberUpToGenerate) {
            throw new InvalidArgumentException('Nummer moet kleiner zijn dan max lijst die je wilt genereren.');
        }

        $results = [];
        for ($i = 1; $i < $numberUpToGenerate +1; $i++) {
            $results[] = $i;
        }

        return array_chunk($results, $numberOfList);
    }
}
