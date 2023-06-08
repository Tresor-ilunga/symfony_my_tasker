<?php

declare(strict_types=1);

namespace Entity;

use App\Entity\Priority;
use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class UserTest extends TestCase
{
    public function testGetName(): void
    {
        $user = new User();
        $user->setName('Tresor');

        $this->assertEquals('Tresor', $user->getName());
    }

    public function testGetEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');

        $this->assertSame('test@example.com', $user->getEmail());
    }

    public function testGetUserIdentifier(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');

        $this->assertSame('test@example.com', $user->getUserIdentifier());
    }

    public function testGetRoles()
    {
        $user = new User();

        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testSetRoles()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);

        $this->assertContains('ROLE_ADMIN', $user->getRoles());
    }

    public function testGetPassword()
    {
        $user = new User();
        $user->setPassword('password');
        $this->assertSame('password', $user->getPassword());
    }

    public function testGetPlainPassword()
    {
        $user = new User();
        $user->setPlainPassword('password');

        $this->assertSame('password', $user->getPlainPassword());
    }

    public function testAddTask()
    {
        $user = new User();
        $task = new Task();
        $user->addTask($task);

        $this->assertContains($task, $user->getTasks());
    }

    public function testRemoveTask()
    {
        $user = new User();
        $task = new Task();
        $user->addTask($task);
        $user->removeTask($task);

        $this->assertNotContains($task, $user->getTasks());
    }

    public function testAddPriority()
    {
        $user = new User();
        $priority = new Priority();
        $user->addPriority($priority);

        $this->assertContains($priority, $user->getPriorities());
    }

    public function testRemovePriority()
    {
        $user = new User();
        $priority = new Priority();
        $user->addPriority($priority);
        $user->removePriority($priority);

        $this->assertNotContains($priority, $user->getPriorities());
    }

}
