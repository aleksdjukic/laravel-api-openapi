<?php

namespace App\OpenApi;

/**
 * @OA\Schema(
 *   schema="TaskCreateRequest",
 *   type="object",
 *   required={"title"},
 *   @OA\Property(property="title", type="string", example="New task"),
 *   @OA\Property(property="description", type="string", example="Optional description")
 * )
 *
 * @OA\Schema(
 *   schema="TaskUpdateRequest",
 *   type="object",
 *   @OA\Property(property="title", type="string", example="Updated title"),
 *   @OA\Property(property="description", type="string", example="Updated description"),
 *   @OA\Property(property="completed", type="boolean", example=true)
 * )
 */
final class TaskSchemas
{
    // This class exists only to hold OpenAPI schemas
}
