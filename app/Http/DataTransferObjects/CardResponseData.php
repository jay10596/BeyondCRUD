<?php

declare(strict_types=1);

namespace App\Http\DataTransferObjects;

use Illuminate\Contracts\Support\Responsable;
use Spatie\DataTransferObject\DataTransferObject;

class CardResponseData extends DataTransferObject implements Responsable
{
    public int $status = 200;
    public string $type = '';

    /** @var \Spatie\DataTransferObject\DataTransferObject|\Spatie\DataTransferObject\DataTransferObjectCollection */
    public array $collection = [];
    public $resource;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $this->type = count($this->collection) > 1 ? 'collection' : 'resource';

        if($this->type == 'collection') {
            return response()->json(
                [
                    'data' => $this->collection,
                    'count' => count($this->collection),
                    'type' => $this->type,
                    'path' => '/cards',
                    'status' => $this->status
                ],
            );
        } else {
            return response()->json(
                [
                    'data' => $this->resource,
                    'type' => $this->type,
                    'status' => $this->status
                ]
            );
        }
    }
}