<?php

namespace App\Models\Dictionary;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Status extends Model
{
    protected $table = 'dictionaries_status';

    protected $fillable = [
        'name',
        'description',
    ];

    public function task(): hasMany
    {
        return $this->hasMany(Task::class, 'priority_id');
    }
}
