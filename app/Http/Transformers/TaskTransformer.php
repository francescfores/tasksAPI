<?php

namespace App\Http\Transformers;

 class TaskTransformer extends Transformer
{
    public function transform($task)
    {
        return [
            'name' => $task['name'],
            'done' => $task['done'],
            'priority' => $task['priority']
        ];
    }
}
