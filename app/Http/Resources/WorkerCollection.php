<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class WorkerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request): Collection
    {;
        return $this->collection->map(function ($item) {
            $response = ['id' => $item->id];
            return array_merge($response, $item->only($item->getFillable()));
        });
    }
}
