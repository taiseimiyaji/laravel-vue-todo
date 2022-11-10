<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'task_status';

    protected $fillable = [
        'id',
        'name',
    ];

    protected $guarded = ['id'];
}
