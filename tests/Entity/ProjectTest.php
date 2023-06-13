<?php

declare(strict_types=1);

namespace Entity;

use App\Entity\Project;
use PHPUnit\Framework\TestCase;

/**
 * Class ProjectTest
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class ProjectTest extends TestCase
{
    public function testSetProjectName(): void
    {
        $project = new Project();
        $project->setProjectName('Project 1');

        $this->assertEquals('Project 1', $project->getProjectName());
    }

    public function testSetProjectLead(): void
    {
        $project = new Project();
        $project->setProjectLead('Project Lead 1');

        $this->assertEquals('Project Lead 1', $project->getProjectLead());
    }

    public function testSetTeam(): void
    {
        $project = new Project();
        $project->setTeam('Team 1');

        $this->assertEquals('Team 1', $project->getTeam());
    }

    public function testSetProgress(): void
    {
        $project = new Project();
        $project->setProgress(0.5);

        $this->assertEquals(0.5, $project->getProgress());
    }
}
