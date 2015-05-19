<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\models\Task;


class ScrumBoardController extends Controller {

    protected $todo = [];
    protected $started = [];
    protected $blocking = [];
    protected $done = [];

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function show()
    {
        $this->getAllTasks();
        return view('Scrumboard', [
            'todos'=>$this->todo,
            'starteds'=>$this->started,
            'blockings'=>$this->blocking,
            'dones'=>$this->done,
        ]);
    }

    public function getAllTasks()
    {
        $tasks = DB::table('task')->get();
        $sortedTasks = [];
        $todo = [];
        $started = [];
        $blocking = [];
        $done = [];
        foreach($tasks as $task) {
            switch ($task->status) {
                case 'todo':
                    array_push($todo, $task);
                break;
                case 'started':
                    array_push($started, $task);
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
        $this->started = $started;
        $this->blocking = $blocking;
        $this->done = $done;
    }

    public function updateTask() {
        $id = Input::get('id');
        $status = Input::get('status');
        $task = Task::find($id);
        $task->status = $status;
        $task->save();
    }
}
