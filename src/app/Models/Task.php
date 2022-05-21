<?php
declare(strict_types=1);

 namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class Task extends Model
 {
     use SoftDeletes;

     protected $table = 'todo';

     protected $fillable = [
         'task_id',
         'task_name',
         'task_label',
         'task_cost',
         'task_deadline',
         'task_detail',
         'task_todos'
     ];

     protected $guarded = ['id'];
 }