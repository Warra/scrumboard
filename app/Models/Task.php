<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'points', 'status', 'sprint_id'];

    /**
     * Relationship between Sprints and Tasks
     *
     */
    public function sprint() {
        $this->belongsTo('App\Models\Sprint');
    }

    public function setSprintString()
    {
        $sprints = $this->belongsToMany('App\Models\Sprint');
        $sprints_arr = $sprints->lists('sprint_number');
        $sprint_str = '';
        foreach ($sprint_arr as $sprint) {
            $sprint_str .= ', '.$sprint;
        }
        $sprints_str = substr_replace($sprints_str, '', 0, 2);
        return $sprints_str;
    }
}
