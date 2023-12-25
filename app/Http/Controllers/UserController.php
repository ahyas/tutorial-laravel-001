<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function getUser(){
        $table=DB::table("users")
        ->select("users.name AS nama","roles.name AS role","bidang.nama AS bidang","users.email")
        ->join("permission", "users.id","=","permission.id_user")
        ->join("roles", "permission.id_role","=","roles.id")
        ->leftJoin("bidang", "users.id_bidang","=","bidang.id")
        ->get();

        return response()->json($table);
    }
}
