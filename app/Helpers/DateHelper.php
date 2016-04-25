<?php
namespace App\Helpers;

class DateHelper
{
    public static function getDays()
    {
        return [
            '1' => 'Mo',
            '2' => 'Tu',
            '3' => 'We',
            '4' => 'Th',
            '5' => 'Fr',
            '6' => 'Sa',
            '7' => 'Su',
        ];
    }

    public static function getWeekDayByNumber($number, $default = null)
    {
        $days = self::getDays();

        return (isset($days[$number])) ? $days[$number] : $default;
    }
}