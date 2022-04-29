<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model{
    protected $table = "member_token";
    protected $fillable = ["member_id", "auth_key"];
    public $timestamps = false;
}