<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="Task",
 *   type="object",
 *   required={"id","title","completed"},
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="title", type="string", example="Buy groceries"),
 *   @OA\Property(property="description", type="string", example="Milk, bread, eggs"),
 *   @OA\Property(property="completed", type="boolean", example=false),
 *   @OA\Property(property="created_at", type="string", example="2025-01-01 12:00:00")
 * )
 */
class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => (bool) $this->completed,
            'created_at' => $this->created_at,
        ];
    }
}
