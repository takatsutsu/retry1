<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'category_ID',
        'detail',
    ];
    public static $rules = array(
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'tell' => 'required',
        'gender' => 'required',
        'name' => 'required',
        'age' => 'integer|min:0|max:150',
        'nationality' => 'required'
    );
}
