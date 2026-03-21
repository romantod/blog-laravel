<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this['name'],
            'company' => $this['employer']['name'],
            'salary_from' => $this['salary']['from'] ?? null,
            'salary_to' => $this['salary']['to'] ?? null
        ];
    }
}
