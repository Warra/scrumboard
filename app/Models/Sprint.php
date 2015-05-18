<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sprint';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sprint_number', 'description', 'start_date', 'end_date'];

    /**
     * Relationship between Sprints and Tasks
     *
     */
    public function tasks() {
        // return $this->hasMany('App\Models\Task');
        return $this->hasMany('App\Models\Task');
    }
}
