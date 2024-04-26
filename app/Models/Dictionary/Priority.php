<?php

namespace App\Models\Dictionary;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Priority extends Model
{
    protected $table = 'dictionaries_priority';

    protected $fillable = [
        'name',
        'priority',
    ];

    public function task(): hasMany
    {
        return $this->hasMany(Task::class, 'priority_id');
    }
}
