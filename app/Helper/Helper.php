<?php

namespace App\Helper;
use App\Models\Card;

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
                return 'Discover';
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

    // Filter card types based on type or validity
    public static function fetch_filtered_cards($filter)
    {
        switch ($filter)
        {
            case 'valid':
                return Card::where('is_valid', 1)->get();
            case 'invalid':
                return Card::where('is_valid', 0)->get();
            case 'mastercard':
                return Card::where('type', 'Mastercard')->get();
            case 'visa':
                return Card::where('type', 'Visa')->get();
            case 'discover':
                return Card::where('type', 'Discover')->get();
            default:
                return Card::where('type', 'Other')->get();
        }
    }
}