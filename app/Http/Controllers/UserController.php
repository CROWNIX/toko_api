<?php

namespace App\Http\Controllers;

use App\Models\Member;
use illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        try {
            $member = Member::all();
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, $member);
    }

    public function show($id)
    {
        try {
            $member = Member::findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, $member);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->input("nama");
        $email = $request->input("email");
        $role = $request->input("role");

        try {
            $member = Member::findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }
        $result = $member->update([
            "nama" => $nama,
            "email" => $email,
            "role" => $role
        ]);

        return $this->responseHasil(200, true, $result);
    }

    public function delete($id)
    {
        try {
            $member = Member::findOrFail($id);
            $delete = $member->delete();
            return $this->responseHasil(200, true, $delete);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }
    }
}
