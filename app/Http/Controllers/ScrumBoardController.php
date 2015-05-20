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
        $allSprints = $this->getSprintDetails();
        // $this->getAllTasks();
        $this->getSprintInput();
        return view('Scrumboard', [
            'todos'=>$this->todo,
            'starteds'=>$this->started,
            'blockings'=>$this->blocking,
            'dones'=>$this->done,
            'sprintDetails'=>$allSprints
        ]);
    }

    public function getSprintInput() {
        if(Input::get('sprintNumber') === null) {
            $sprintInput = 1;
        }else {
            $sprintInput = Input::get('sprintNumber');
        }
        $tasks = $this->getSprintTasks($sprintInput);
        $allSprints = $this->getSprintDetails();

        return view('Scrumboard', [
            'todos'=>$this->todo,
            'starteds'=>$this->started,
            'blockings'=>$this->blocking,
            'dones'=>$this->done,
            'sprintDetails'=>$allSprints
        ]);

    }

    public function getSprintTasks($sprintNumber) 
    {
        $tasks = DB::table('task')->where('sprint_id', $sprintNumber)->get();
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

    //replicated from TaskController
    public function getSprintDetails() {
        $sprints = DB::table('sprint')->get();
        $sprint_arr = [];
        foreach($sprints as $sprint){
            $str = 'Sprint '.$sprint->sprint_number.' ('.$sprint->start_date.' - '.$sprint->end_date.')';
            $sprint_arr[$sprint->sprint_number] = $str;
        }
        return  $sprint_arr;

    }
}
