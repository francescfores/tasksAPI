<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Http\Controllers\Controller;
use App\Http\Transformers\TaskTransformer;

class TaskController extends Controller
{
    protected $TaskTransformer;
    protected $tagTransformer;

    public function __construct(TaskTransformer $TaskTransformer)
    {
         $this->TaskTransformer = $TaskTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transformer = new TaskTransformer();

        $tasks = Task::get();

        $value = "{\"msg\":\"Success\",\"tasks\":[{\"name\":\"Josiah Thiel\",\"done\":\"1\",\"priority\":\"7\"},{\"name\":\"Buford Gerlach\",\"done\":\"1\",\"priority\":\"1\"},{\"name\":\"Abdiel Dooley\",\"done\":\"0\",\"priority\":\"5\"},{\"name\":\"Mr. Maximus Runolfsdottir III\",\"done\":\"1\",\"priority\":\"5\"},{\"name\":\"Dora Larkin\",\"done\":\"0\",\"priority\":\"1\"},{\"name\":\"Nia Cassin PhD\",\"done\":\"1\",\"priority\":\"5\"},{\"name\":\"Prof. Helmer Hoppe\",\"done\":\"0\",\"priority\":\"1\"},{\"name\":\"Marisol Ortiz\",\"done\":\"0\",\"priority\":\"1\"},{\"name\":\"Prof. Maryse McLaughlin\",\"done\":\"0\",\"priority\":\"7\"},{\"name\":\"Dr. Bill Kovacek V\",\"done\":\"1\",\"priority\":\"0\"}]}";
//        return response() -> json([
//            "msg" => "Success",
//            "tasks" =>  $this->TaskTransformer->transformCollection($tasks)
//            ], 200
//        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if(!$task){
            return response() -> json([
            "msg" => "does not exist"            
            ], 404
        );
        }else{            
        return response() -> json([
            "msg" => "Success",
            "task" =>  $this->TaskTransformer->transform($task)
            ], 200
        );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return ['updated' => true];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return ['deleted' => true];
    }

    public function transformCollection($task)
    {
     return array_map([$this, 'transform'],$task->toArray());
    }
    public function transform($task)
    {
        return [
            'name' => $task['name'],
            'done' => $task['done'],
            'priority' => $task['priority']
        ];
            

    }
    
}
