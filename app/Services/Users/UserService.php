<?php
    namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;

    class UserService{
        
        //Fetch All Users
        public static function getAllUsers(){
            $users = DB::table('users')->get();
            return $users;
        }

        //Fetch Active Users
        public static function getActiveUsers(){
            return User::active()->get();
        }

        //Fetch Inactive USers
        public static function getInactiveUsers(){
            return User::inactive()->get();
        }

        //Get User By ID
        public static function getUserById($id){
            return User::find($id);
        }
    }
?>