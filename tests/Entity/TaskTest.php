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
    /**
     * This method is called before each test.
     *
     * @return void
     */
    public function testSetTitle(): void
    {
        $task = new Task();
        $task->setTitle('title');

        $this->assertSame('title', $task->getTitle());
    }

    /**
     * This method is called before each test.
     *
     * @return void
     */
    public function testSetDescription(): void
    {
        $task = new Task();
        $task->setDescription('description');

        $this->assertSame('description', $task->getDescription());
    }

    /**
     * This method is called before each test.
     *
     * @return void
     */
    public function testSetPriorities(): void
    {
        $task = new Task();
        $task->setPriorities('high');

        $this->assertSame('high', $task->getPriorities());
    }

    /**
     * This method is called before each test.
     *
     * @return void
     */
    public function testSetState(): void
    {
        $task = new Task();
        $task->setState('todo');

        $this->assertSame('todo', $task->getState());
    }
}
