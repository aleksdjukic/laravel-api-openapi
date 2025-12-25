<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task(): void
    {
        $response = $this->postJson('/api/v1/tasks', [
            'title' => 'Test task',
            'description' => 'Test description',
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'title',
                'description',
                'completed',
                'created_at',
            ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test task',
        ]);
    }

    public function test_validation_fails_without_title(): void
    {
        $response = $this->postJson('/api/v1/tasks', []);

        $response->assertStatus(422);
    }

    public function test_can_update_task(): void
    {
        $task = Task::create([
            'title' => 'Old title',
            'description' => 'Old desc',
            'completed' => false,
        ]);

        $response = $this->putJson("/api/v1/tasks/{$task->id}", [
            'completed' => true,
        ]);

        $response->assertStatus(200);

        $this->assertTrue($task->fresh()->completed);
    }

    public function test_can_delete_task(): void
    {
        $task = Task::create([
            'title' => 'Delete me',
            'description' => 'Test',
        ]);

        $response = $this->deleteJson("/api/v1/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
