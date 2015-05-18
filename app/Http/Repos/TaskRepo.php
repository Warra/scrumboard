<?php namespace App\Http\Repos;

use App\Models\Task;

class TaskRepo {

    /**
     * Receive an array of attributes and create a task.
     *
     * @var array
     */
    public function add($attributes)
    {
        Task::create($attributes);
    }
}
