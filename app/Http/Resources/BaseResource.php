<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseResource extends JsonResource
{
    /**
     * Convert array keys to camelCase recursively.
     */
    protected function toCamelCaseArray(array $data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            $camelKey = is_string($key) ? Str::camel($key) : $key;

            if (is_array($value)) {
                $result[$camelKey] = $this->toCamelCaseArray($value);
            } else {
                $result[$camelKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Transform the resource into an array (auto-camelCase keys).
     */
    public function toArray(Request $request): array
    {
        $array = parent::toArray($request);
        return $this->toCamelCaseArray($array);
    }
}
