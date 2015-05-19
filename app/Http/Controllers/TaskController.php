<?php namespace App\Http\Controllers;
use App\Http\Repos\TaskRepo;
use App\models\Sprint;
use App\models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller {

    protected $statuses = [
            'todo' => 'To Do',
            'doing' => 'Doing',
            'blocked' => 'Blocked',
            'done' => 'Done',
    ];
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function addShow() 
    {
        return view('TaskAddForm', [
            'sprintDetails' => $this->getSprintDetails(),
            'statuses' => $this->statuses 
        ]);
    }



    public function add($sprint_id, $name, $description, $points, $status)
    {
        $task = [
            'sprint_id' => $sprint_id,
            'name' => $name,
            'description' => $description,
            'points' => $points,
            'status' => $status
        ];

        $taskrepo = new taskrepo();
        $taskrepo->add($task);
    }

    public function getAddInputs() 
    {
        $sprint_number = Input::get('sprint_number');
        $name = Input::get('name');
        $description = Input::get('description');
        $points = Input::get('points');
        $status = Input::get('status');

        $this->add($sprint_number, $name, $description, $points, $status);
        $success = 'Task added successfully!';

        $statuses = [
            'todo' => 'To Do',
            'doing' => 'Doing',
            'blocked' => 'Blocked',
            'done' => 'Done',
        ];

        return view('TaskAddForm', [
            'success'=>$success,
            'sprintDetails' => $this->getSprintDetails(),
            'statuses' => $this->statuses 
        ]);
    }

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

