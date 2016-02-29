<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TastkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testTasksUseJson()
    {
       $this->get('/task')->seeJson()->seeStatusCode(200);
    }

    public function testTasksInDatabaseAreListedByAPI()
    {
        //$this->createFakeTasks();
//        $this->get('/task/1')->seeJsonStructure([
//                'task' => [
//                    'name', 'done','priority'
//                ]
//            ])->seeStatusCode(200);
    }
//    private function createFakeTasks() {
//        $faker = Faker\Factory::create();
//        $task = new \App\Task();
//        $task->name = $faker->sentence;
//        $task->done = $faker->boolean;
//        $task->priority = $faker->randomDigit;
//        $task->save();
//        return $task;
//    }

}
