<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use App\Activity;

class Project extends Model
{
    protected $guarded = [];

    /**
     * The project's old attributes.
     *
     * @var array
     */
    public $old = [];


    public function path(){
        return "/projects/{$this->id}";
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    // public function recordActivity($type)
    // {
    //     Activity::create([
    //         'project_id' => $this->id,
    //         'description' => $type
    //     ]);
    // }
        // REFACTOR 1
    public function recordActivity($description)
    {
        // $this->activity()->create(compact('description'));
        //  REFACTOR 1
        $this->activity()->create([
            'user_id' => ($this->project ?? $this)->owner_id,
            'description' => $description,
            'changes' => $this->activityChanges()

        ]);

    }

    /**
     * Fetch the changes to the model.
     *
     * @param  string $description
     * @return array|null
     */
    protected function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => array_except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
                'after' => array_except($this->getChanges(), 'updated_at')
            ];
        }

    }


}
