<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model; 

class User extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $fillable = ['user_id', 'notification_id'];
}
