<?php
namespace App\Helpers;

class DateHelper
{
    public static function getDays()
    {
        return [
            '0' => 'Su',
            '1' => 'Mo',
            '2' => 'Tu',
            '3' => 'We',
            '4' => 'Th',
            '5' => 'Fr',
            '6' => 'Sa',
        ];
    }

    public static function getWeekDayByNumber($number, $default = null)
    {
        $days = self::getDays();

        return (isset($days[$number])) ? $days[$number] : $default;
    }

    public static function getWeekPeriods($weekDays)
    {
        $weekDaysResponse = [];
        if (strlen($weekDays) == 1) {
            return [
                $weekDays
            ];
        }
        for ($i = (int)$weekDays[0]; $i <= (int) $weekDays[2]; $i++) {
            $weekDaysResponse[] = $i;
        }

        return $weekDaysResponse;
    }

    public static function getWeekDaysFromPeriods($dates, $weekDays = '0-6')
    {
        if (!$dates) {
            return [];
        }
        $responseDate = [];
        foreach ($dates as $date) {
            $dateFrom = new \DateTime($date[0]);
            while (true) {
                $currentDay = $dateFrom->modify('+1 day');
                $weekDay = $currentDay->format('N');
                $dateFormat = $currentDay->format('Y-m-d');
                if (in_array($weekDay, self::getWeekPeriods($weekDays))) {
                    $responseDate[] = $dateFormat;
                }
                if ($dateFormat == $date[1]) {
                    break;
                }
            }
        }

        return $responseDate;
    }

    public static function getPeriodForIncludeFalse($dates, $dateFrom, $dateTo)
    {
        $firstDate = $secondDate = null;
        if ($dates['date_from'] < $dateFrom) {
            if ($dates['date_to'] > $dateTo) {
                $firstDate = $dateFrom;
                $secondDate = $dateTo;
            } else {
                if ($dateFrom < $dates['date_to']) {
                    $firstDate = $dateFrom;
                    $secondDate = $dates['date_to'];
                }
            }
        } else {
            if ($dateTo > $dates['date_to']) {
                $firstDate = $dates['date_from'];
                $secondDate = $dates['date_to'];
            } else {
                if ($dateTo > $dates['date_from']) {
                    $firstDate = $dates['date_from'];
                    $secondDate = $dateTo;
                }
            }
        }
        if (!$firstDate && !$secondDate) {
            return [];
        }
        return [
            [
                $firstDate,
                $secondDate,
            ]
        ];
    }

    public static function getPeriodForIncludeTrue($dates, $dateFrom, $dateTo)
    {
        $response = [];
        if ($dates['date_from'] > $dateFrom) {
            if ($dateTo > $dates['date_from']) {
                if ($dates['date_to'] > $dateTo) {
                    $response = [
                        [
                            $dateFrom,
                            $dates['date_from'],
                        ]
                    ];
                } else {
                    $response = [
                        [
                            $dateFrom, $dates['date_from'],
                        ],
                        [
                            $dates['date_to'], $dateTo,
                        ]
                    ];
                }
            }
        } else {
            if ($dateFrom < $dates['date_to']) {
                $response = [
                    [
                        $dates['date_to'],
                        $dateTo,
                    ]
                ];
            } else {
                $response = [
                    [
                        $dateFrom,
                        $dateTo,
                    ]
                ];
            }
        }

        return $response;
    }
}