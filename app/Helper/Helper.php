<?php

namespace App\Helper;

class Helper
{
    // Add space after every 4 numbers
    public static function set_number_format($card_no)
    {
        return chunk_split($card_no, 4, ' ');
    }

    // Check card type
    public static function check_card_type($first_digit)
    {
        switch ($first_digit)
        {
            case '2':
            case '5':
                return 'Mastercard';
            case '4':
                return 'Visa';
            case '6':
                return 'Maestro';
            default:
                return 'Other';
        }
    }

    // Check validity using Luhn algorithm
    public static function is_valid($card_no)
    {
        $sum = 0;
        $alt = false;

        for($i = strlen($card_no) - 1; $i >= 0; $i--) 
        {
            if($alt)
            {
                $temp = $card_no[$i];
                $temp *= 2;
                $card_no[$i] = ($temp > 9) ? $temp = $temp - 9 : $temp;
            }

            $sum += $card_no[$i];
            $alt = !$alt;
        }

        return $sum % 10 == 0;
    }
}