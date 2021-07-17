<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class DepartmentCollection extends ResourceCollection
{
    /**
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
    }
}
