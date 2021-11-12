<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasApiTokens, HasFactory, Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[] 
     */
    protected $fillable = [
        'userid_1',
        'userid_2'
    ];


}
