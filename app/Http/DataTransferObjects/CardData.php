<?php

declare(strict_types=1);

namespace App\Http\DataTransferObjects;

use App\Models\Card;
use Spatie\DataTransferObject\DataTransferObject;

class CardData extends DataTransferObject
{
    public int $id;
    public string $number;
    public string $cvv;
    public string $type;
    public string $owner;
    public string $expiration_date;
    public bool $is_valid;
    public string $updated_at;

    public static function fromModel(Card $card): CardData
    {
        return new static([
            'id' => $card->id,
            'number' => $card->number,
            'cvv' => $card->cvv,
            'type' => $card->type,
            'owner' => $card->owner,
            'expiration_date' => $card->expiration_date,
            'is_valid' => $card->is_valid,
            'updated_at' => $card->updated_at->diffForHumans(),
            'path' => '/cards/' . $card->id
        ]);
    }
}