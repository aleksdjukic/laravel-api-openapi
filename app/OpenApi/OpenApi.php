<?php

namespace App\OpenApi;

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *   @OA\Info(
 *     title="Laravel API OpenAPI Example",
 *     version="1.0.0",
 *     description="Task management REST API documented with OpenAPI 3",
 *     @OA\Contact(
 *       name="Aleksandar Đukić",
 *       email="aleksandardjukic@example.com"
 *     )
 *   ),
 *   @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local development server"
 *   )
 * )
 */
class OpenApi {}
