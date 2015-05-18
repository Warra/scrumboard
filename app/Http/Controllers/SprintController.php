<?php namespace App\Http\Controllers;
use App\Http\Repos\SprintRepo;
use Illuminate\Support\Facades\Input;

class SprintController extends Controller {

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function addShow() {
        return view('SprintAddForm');
    }



    public function add($sprint_number, $description, $start_date, $end_date, $total_points)
    {
        $sprint = [
            'sprint_number' => $sprint_number,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total_points' => $total_points
        ];
        $sprintRepo = new SprintRepo();
        $sprintRepo->add($sprint);
    }

    public function getAddInputs() {
        $sprint_number = Input::get('sprint_number');
        $description = Input::get('description');
        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');
        $total_points = Input::get('total_points');

        $this->add($sprint_number, $description, $start_date, $end_date, $total_points);
        $success = 'Sprint added successfully!';
        return view('SprintAddForm', ['success'=>$success]);
    }
}

// public function add($sprint_number, $description, $start_date, $end_date, $total_points)
// {
//     dd($sprint_number);
//     $sprint = [
//         'sprint_number' => $sprint_number,
//         'description' => $description,
//         'start_date' => $start_date,
//         'end_date' => $end_date,
//         'total_points' => $total_points
//     ];

//     SprintRepo::add($sprint);

// }
