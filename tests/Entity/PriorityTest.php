<?php

declare(strict_types=1);

namespace Entity;

use App\Entity\Priority;
use PHPUnit\Framework\TestCase;

/**
 * Class PriorityTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class PriorityTest extends TestCase
{
    public function testGetName(): void
    {
        $priority = new Priority();
        $priority->setName('High');

        $this->assertEquals('High', $priority->getName());
    }

    public function testSetName(): void
    {
        $priority = new Priority();
        $priority->setName('Low');

        $this->assertEquals('Low', $priority->getName());
    }

    public function testGetValue(): void
    {
        $priority = new Priority();
        $priority->setValue(1);

        $this->assertEquals(1, $priority->getValue());
    }
}
