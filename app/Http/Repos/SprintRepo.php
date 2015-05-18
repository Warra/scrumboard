<?php namespace App\Http\Repos;

use App\Models\Sprint;

class SprintRepo {

    // public function __construct($sprint_number, $description, $start_date, $end_date, $total_points)
    // {
    //     $this->sprint_number = $sprint_number
    //     $this->description = $description;
    //     $this->start_date = $start_date;
    //     $this->end_date = $end_date;
    //     $this->total_points = $total_points;
    // }

    /**
     * Receive an array of attributes and create a sprint.
     *
     * @var array
     */
    public function add($attributes) {
        Sprint::create($attributes);
    }
}
