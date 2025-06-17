<?php

use App\Models\Task;
use function Pest\Laravel\{get, post, put, delete};
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class); 

describe('TaskController', function () {
    beforeEach(function () {
        $this->task = Task::factory()->create();
    });

    it('displays a listing of tasks', function () {
        get(route('tasks.index'))
            ->assertOk()
            ->assertViewIs('tasks.index')
            ->assertViewHas('tasks');
    });

    it('shows the create form', function () {
        get(route('tasks.create'))
            ->assertOk()
            ->assertViewIs('tasks.create');
    });

    it('stores a newly created task', function () {
        $data = [
            'title' => 'Test Task',
            'detail' => 'This is a test task detail'
        ];

        post(route('tasks.store'), $data)
            ->assertRedirect(route('tasks.index'))
            ->assertSessionHas('message');

        $this->assertDatabaseHas('tasks', $data);
    });

    it('requires valid data when storing', function () {
        post(route('tasks.store'), [])
            ->assertSessionHasErrors(['title', 'detail']);
    });

    it('shows a specific task', function () {
        get(route('tasks.show', $this->task))
            ->assertOk()
            ->assertViewIs('tasks.show')
            ->assertViewHas('task', $this->task);
    });

    it('shows the edit form', function () {
        get(route('tasks.edit', $this->task))
            ->assertOk()
            ->assertViewIs('tasks.edit')
            ->assertViewHas('task', $this->task);
    });

    it('updates a task', function () {
        $data = [
            'title' => 'Updated Task',
            'detail' => 'Updated task detail',
            'state' => true
        ];

        put(route('tasks.update', $this->task), $data)
            ->assertRedirect(route('tasks.index'))
            ->assertSessionHas('message');

        $this->assertDatabaseHas('tasks', $data);
    });

    it('requires valid data when updating', function () {
        put(route('tasks.update', $this->task), [])
            ->assertSessionHasErrors(['title', 'detail']);
    });

    it('deletes a task', function () {
        delete(route('tasks.destroy', $this->task))
            ->assertRedirect(route('tasks.index'))
            ->assertSessionHas('message');

        $this->assertDatabaseMissing('tasks', ['id' => $this->task->id]);
    });

    it('paginates tasks with 7 per page', function () {
        Task::factory()->count(15)->create();

        get(route('tasks.index'))
            ->assertViewHas('tasks', function ($tasks) {
                return $tasks->count() === 7;
            });
    });

    it('sets state to false by default when creating', function () {
        $task = Task::factory()->create();

        expect($task->state)->toBeFalse();
    });
});