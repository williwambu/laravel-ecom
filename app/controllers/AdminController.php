<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/22/2015
 * Time: 10:56 AM
 */

class AdminController extends BaseController {

    public function adminLogin(){
        return View::make('layouts.admin.index');
    }

    public function createAdmin($username,$password){
        $user = new Admin();
        $user -> username = $username;
        $user -> password = Hash::make($password);

        $user -> save();
        return 'admin created';
    }

    public function login(){
        $username = Input::get('username');
        $password = Input::get('password');

        if(Auth::attempt(['username'=>$username,'password'=>$password])){
            return View::make('layouts.admin.admin_panel');
        }
        return 'login failed';
    }

    public function logout(){
        Auth::logout();

        return Redirect::to(route('admin'));
    }

    public function deleteAdmin($id){
        $admin = Admin::findOrFail($id);

        $admin -> delete();

        return 'admin deleted';
    }
}