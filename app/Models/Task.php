<?php

namespace App\Models;

use App\Models\Dictionary\Priority;
use App\Models\Dictionary\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'task';

    protected $fillable = [
        'status_id',
        'priority_id',
        'user_id',
        'name',
        'description'
    ];


    public function status(): HasOne
    {
        return $this->HasOne(Status::class, 'id', 'status_id');
    }

    public function priority(): HasOne
    {
        return $this->HasOne(Priority::class, 'id', 'priority_id');
    }

    public function user(): HasOne
    {
        return $this->HasOne(User::class, 'id', 'user_id');
    }
}
