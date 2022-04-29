<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    public function login(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");

        $member = Member::query()->firstWhere(["email" => $email]);

        if($member == null){
            return $this->responseHasil(400, false, "Email tidak ditemukan");
        }

        if(!Hash::check($password, $member->password)){
            return $this->responseHasil(400, false, "Password tidak valid");
        }

        $login = Login::create([
            "member_id" => $member->id,
            "auth_key" => $this->RandomString()
        ]);

        if(!$login){
            return $this->responseHasil(401, false, "Unauthorized");
        }

        $data = [
            "token" => $login->auth_key,
            "user" => [
                "id" => $member->id,
                "email" => $member->email
            ]
        ];

        return $this->responseHasil(200, true, $data);
    }
}