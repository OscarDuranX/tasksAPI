<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 11/01/16
 * Time: 18:27
 */

namespace App\Transformers;


class TaskTransformer extends Transformer
{

    public function transform($task)
    {
        return [
            'name' => $task['name'],
            'done' => (boolean) $task['done'],
            'priority' =>(int)$task['priority'],
        ];
    }

}