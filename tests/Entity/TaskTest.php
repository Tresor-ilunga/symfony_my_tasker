<?php

declare(strict_types=1);

namespace Entity;

use App\Entity\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class TaskTest extends TestCase
{
    public function testSetTitle(): void
    {
        $task = new Task();
        $task->setTitle('title');

        $this->assertSame('title', $task->getTitle());
    }

    public function testSetDescription(): void
    {
        $task = new Task();
        $task->setDescription('description');

        $this->assertSame('description', $task->getDescription());
    }

    public function testSetPriorities(): void
    {
        $task = new Task();
        $task->setPriorities('high');

        $this->assertSame('high', $task->getPriorities());
    }

    public function testSetState(): void
    {
        $task = new Task();
        $task->setState('todo');

        $this->assertSame('todo', $task->getState());
    }
}
