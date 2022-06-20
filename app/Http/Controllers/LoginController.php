<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        try {
            $member = Member::query()->firstWhere(["email" => $email]);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }


        if ($member == null) {
            return $this->responseHasil(404, false, "Email tidak terdaftar");
        }

        if (!Hash::check($password, $member->password)) {
            return $this->responseHasil(400, false, "Password tidak valid");
        }

        $login = Login::create([
            "member_id" => $member->id,
            "auth_key" => Str::random(100)
        ]);

        $data = [
            "token" => $login->auth_key,
            "user" => [
                "id" => $member->id,
                "email" => $member->email,
                "role" => $member->role,
            ]
        ];

        return $this->responseHasil(200, true, $data);
    }
}