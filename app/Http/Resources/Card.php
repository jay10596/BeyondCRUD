<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Card extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'cvv' => $this->cvv,
            'type' => $this->type,
            'owner' => $this->owner,
            'expiration_date' => $this->expiration_date,
            'is_valid' => $this->is_valid,
            'updated_at' => $this->updated_at->diffForHumans(),
            'path' => '/cards/' . $this->id
        ];;
    }
}
