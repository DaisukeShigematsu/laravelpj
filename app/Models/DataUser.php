<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',

    );
    public function getTitle(){
        return 'ID'.$this->id . ':' . $this->user_id;
    }
}
