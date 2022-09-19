<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'task';

    protected $fillable = [
        'id',
        'name',
        'detail',
        'deadline',
        'cost',
        'status',
    ];

    protected $guarded = ['id'];
}
