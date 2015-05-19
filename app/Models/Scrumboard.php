<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scrumboard extends Model {

    protected $todo = [];
    protected $doing = [];
    protected $blocking = [];
    protected $done = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getAllTasks()
    {
        $tasks = DB::table('task')->get();
        $sortedTasks = [];
        $todo = [];
        $doing = [];
        $blocking = [];
        $done = [];
        foreach($tasks as $task) {
            switch ($task->status) {
                case 'todo':
                    array_push($todo, $task);
                break;
                case 'doing':
                    array_push($doing, $task);
                break;
                case 'blocking':
                    array_push($blocking, $task);
                break;
                case 'done':
                    array_push($done, $task);
                break;
            }
        }
        $this->todo = $todo;
        $this->doing = $doing;
        $this->blocking = $blocking;
        $this->done = $done;
    }
}
