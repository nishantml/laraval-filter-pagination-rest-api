<?php

namespace App;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use Filterable;

    protected $fillable = [
        'id',
        'name',
        'assigned_to',
        'desc',
        'start_date',
        'due_date',
        'priority',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'deleted_at'
    ];




    public function assigned_user()
    {
        return $this->belongsTo('App\User', 'assigned_to', 'id')->select(['id', 'name', 'email']);
    }
}
