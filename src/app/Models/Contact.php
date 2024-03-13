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

    public static $rules = array(
        
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'email'  => 'required',
        'tell'  => 'required',
        'address'=> 'required',
        'building' => 'required',
        'category_id' => 'required',
        'detail' => 'required',
    );
    public function getDetail()
    {
        $txt = 'ID:' .
        $this->id . ' ' .
        $this->first_name .
        $this->last_name .
        $this->gender .
        $this->email .
        $this->tell .
        $this->address .
        $this->building .
        $this->category_id .
        $this->detail ;
        return $txt;
    }


    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
}
