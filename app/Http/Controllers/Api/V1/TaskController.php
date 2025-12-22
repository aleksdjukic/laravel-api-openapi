<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *   name="Tasks",
 *   description="Task management"
 * )
 */
class TaskController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/v1/tasks",
     *   tags={"Tasks"},
     *   summary="List tasks",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/Task")
     *     )
     *   )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(
            TaskResource::collection(Task::latest()->paginate(10))
        );
    }

    /**
     * @OA\Post(
     *   path="/api/v1/tasks",
     *   tags={"Tasks"},
     *   summary="Create task",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/TaskCreateRequest")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Created",
     *     @OA\JsonContent(ref="#/components/schemas/Task")
     *   ),
     *   @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(TaskStoreRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return response()->json(new TaskResource($task), 201);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/tasks/{id}",
     *   tags={"Tasks"},
     *   summary="Show task",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Task")
     *   ),
     *   @OA\Response(response=404, description="Not found")
     * )
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(new TaskResource($task));
    }

    /**
     * @OA\Put(
     *   path="/api/v1/tasks/{id}",
     *   tags={"Tasks"},
     *   summary="Update task",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/TaskUpdateRequest")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Updated",
     *     @OA\JsonContent(ref="#/components/schemas/Task")
     *   ),
     *   @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(TaskUpdateRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return response()->json(new TaskResource($task));
    }

    /**
     * @OA\Delete(
     *   path="/api/v1/tasks/{id}",
     *   tags={"Tasks"},
     *   summary="Delete task",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Task ID",
     *     @OA\Schema(type="integer", example=1)
     *   ),
     *   @OA\Response(response=204, description="Deleted"),
     *   @OA\Response(response=404, description="Not found")
     * )
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(null, 204);
    }

}
