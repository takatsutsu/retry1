<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
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
        'category_id',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function search($query, $gender_search)
    {
        if (!empty($gender_search)) {
            $query->where('gender_id', $gender_search);
        }
    }

    public function scoperandomSearch($query, $random_search)
    {
        if (!empty($random_search)) {
            $query->where('email', 'like', '%' . $random_search . '%');
        }
    }
}
