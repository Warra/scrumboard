<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ScrumBoardController extends Controller {

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function show()
    {
        $tasks = $this->getAllTasks();
        return view('Scrumboard', ['tasks'=>$tasks]);
    }

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
        $sortedTasks['todo'] = $todo;
        $sortedTasks['doing'] = $doing;
        $sortedTasks['blocking'] = $blocking;
        $sortedTasks['done'] = $done;

        return $sortedTasks;
    }
}
