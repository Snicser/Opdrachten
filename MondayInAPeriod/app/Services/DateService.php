<?php

namespace App\Services;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;

class DateService
{
    public function calculateMondays($startDate, $endDate): array
    {
        $results = [];

        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        $datePeriod = new DatePeriod($startDate, new DateInterval('P1D'), $endDate);

        $isFullWeek = $endDate->diffInWeeks($startDate);

        // Check if date is full week, e.g. 17-09-2022 to - 23-09-2022 isn't a full week
        if ($isFullWeek == 0) {
            return $results;
        }

        foreach ($datePeriod as $period) {
            $date = $period->dayOfWeekIso;

            // 1 in dayOfWeekIso is monday
            if ($date == 1) {
                $results[] = $period->format('m-d-Y');
            }
        }

        return $results;
    }
}
