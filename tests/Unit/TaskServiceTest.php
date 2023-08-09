<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Interfaces\TaskRepositoryInterface;
use Tests\TestCase;
use Exception;

class TaskServiceTest extends TestCase
{
    private $taskRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taskRepositoryMock = $this->mock(TaskRepositoryInterface::class);
    }

    public function testShouldListAllTasks(): void
    {
        // Arrange
        $fakeTasks = Task::factory()->times(10)->new();
        $this->taskRepositoryMock
            ->shouldReceive('getAllDoctorPatients')
            ->andReturn($fakeTasks);
        $taskService = new TaskService($this->taskRepositoryMock);

        // Act
        $result = $taskService->getAll();

        // Assert
        $this->assertEquals($fakeTasks, $result);
    }

    public function testShouldThrowErrorWhenModelReturnsErrorOnListAllTasks(): void
    {
        // Arrange
        $this->taskRepositoryMock
            ->shouldReceive('getAll')
            ->andThrow(new Exception('Expected Exception was thrown'));
        $taskService = new TaskService($this->taskRepositoryMock);

        // Act
        $result = $taskService->getAllDoctorPatients();

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldCreateATask(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('create')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;

        // Act
        $result = $taskService->create($body);

        // Assert
        $this->assertEquals($fakeTask, $result);
    }

    public function testShouldThrowValidationErrorWhenParamsInvalidOnCreateAPatient(): void
    {
        // Arrange
        $fakeTask = [];
        $this->taskRepositoryMock
            ->shouldReceive('create')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;

        // Act
        $result = $taskService->create($body);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldThrowErrorWhenModelReturnsErrorOnCreateAPatient(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('create')
            ->andThrow(new Exception('Expected Exception was thrown'));
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;

        // Act
        $result = $taskService->create($body);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldUpdateATask(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('update')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;
        $taskId = rand(1, 5);

        // Act
        $result = $taskService->updatePatient($taskId, $body);

        // Assert
        $this->assertEquals($fakeTask, $result);
    }

    public function testShouldThrowValidationErrorWhenParamsInvalidOnUpdateATask(): void
    {
        // Arrange
        $fakeTask = [];
        $this->taskRepositoryMock
            ->shouldReceive('update')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;
        $taskId = rand(1, 5);

        // Act
        $result = $taskService->update($taskId, $body);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldThrowErrorWhenModelReturnsErrorOnUpdateATask(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('update')
            ->andThrow(new Exception('Expected Exception was thrown'));
        $taskService = new TaskService($this->taskRepositoryMock);
        $body = $fakeTask;
        $taskId = rand(1, 5);

        // Act
        $result = $taskService->update($taskId, $body);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldDeleteATask(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('delete')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $taskId = rand(1, 5);
        $expectedResponse = 'Tasl deleted sucefully.';

        // Act
        $result = $taskService->delete($taskId);

        // Assert
        $this->assertEquals($expectedResponse, $result);
    }

    public function testShouldThrowValidationErrorWhenParamsInvalidOnDeleteATask(): void
    {
        // Arrange
        $fakeTask = [];
        $this->taskRepositoryMock
            ->shouldReceive('delete')
            ->andReturn($fakeTask);
        $taskService = new TaskService($this->taskRepositoryMock);
        $taskId = rand(1, 5);

        // Act
        $result = $taskService->delete($taskId);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }

    public function testShouldThrowErrorWhenModelReturnsErrorOnDeleteATask(): void
    {
        // Arrange
        $fakeTask = Task::factory()->new();
        $this->taskRepositoryMock
            ->shouldReceive('delete')
            ->andThrow(new Exception('Expected Exception was thrown'));
        $taskService = new TaskService($this->taskRepositoryMock);
        $taskId = rand(1, 5);

        // Act
        $result = $taskService->delete($taskId);

        // Assert
        $this->assertArrayHasKey('error', $result);
    }
}