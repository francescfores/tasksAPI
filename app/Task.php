<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'done', 'priority'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
