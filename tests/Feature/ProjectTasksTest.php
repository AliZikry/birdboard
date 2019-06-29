<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
   /** @test */

   public function a_project_can_have_tasks()
   {

    $this->withoutExceptionHandling();

    $this->signIn();

    $project = factory(Project::class)->create(['owner_id'=> auth()->id()]);

    $this->post( '/projects/'. $project . '/tasks' , ['body' => 'lorem ipsum']);

    $this->get( '/projects/' . $project . '/tasks')->assertSee('lorem ipsum');
   }
}
