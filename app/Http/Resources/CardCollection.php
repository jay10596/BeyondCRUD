<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CardCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'cards' => $this->collection,
            'count' => $this->count(),
            'path' => '/cards'
        ];;
    }
}
