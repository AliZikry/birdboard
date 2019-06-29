<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\Activity;

class Task extends Model
{
    protected $guarded = [];

    public $old = [];

    protected $touches = ['project'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function recordActivity($description)
    {
        $this->activity()->create([
            'user_id' => ($this->project ?? $this)->owner_id,
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }

    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('incompleted_task');
    }
}
