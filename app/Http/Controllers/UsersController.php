<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\SelfEditUserRequest;

use App\User;
use App\Role;

use Auth;
class UsersController extends Controller{
    
    function showNewUserForm(){
    	$roles=Role::all();
    	return view('backend.users.new',compact('roles'));
    }
    
    function showUsersList(){
    	$users=User::where('id','!=',1)->get();
    	return view('backend.users.list',compact('users'));
    }

    function showEditUserForm($id){
        $roles=Role::all();
        $user=User::find($id);
    	return view('backend.users.edit',compact('roles','user'));
    }

    function showUserInfo($id){
    	$user=User::whereId($id)->first();
    	$roles=Role::all();
    	if($id!=1){
    		return view('backend.users.info',compact('user','roles'));
    	}else{
    		return redirect()->action('UsersController@showUsersList');
    	}
    }

    function delUser($id){
        if($id>1){
            $user=User::find($id);
            $user->delete();
        }
        return redirect()->action('UsersController@showUsersList');
    }

    function editUser(EditUserRequest $req){
        //obtengo el usuario con la id obtenida
        $user = User::find($req->get('user_id'));

        //modifico el usuario...
        $user->name=$req->get('name');
        if(strlen($req->get('password'))>0){
            $user->password=bcrypt($req->get('password'));
        }
        if(strlen($req->get('email'))>0){
            $user->email=$req->get('email');
        }

        $user->save();//guardo los cambios en el usuario en la base de datos

        $selected_roles = $req->get('roles');
        $user->detachRoles();//quito los roles al usuario antes de re-asignarselos
        foreach ($selected_roles as $sel_r) {
            $r=Role::whereId($sel_r)->first();
            $user->attachRole($r);
        }
        return redirect()->action('UsersController@showUsersList');
    }

    function addNewUser(NewUserRequest $req){
        //creo un nuevo usuario
    	$user = new User(array(
    		'name'=>$req->get('name'),
    		'password'=>bcrypt($req->get('password')),
    		'email'=>$req->get('email'),
    	));
    	
    	$user->save();//guardo el usuario en la base de datos

    	$selected_roles = $req->get('roles');
        //por cada rol seleccionado previamente, se le asignará al usuario
    	foreach ($selected_roles as $sel_r) {
    		$r=Role::whereId($sel_r)->first();
    		$user->attachRole($r);
    	}
    	return redirect()->action('UsersController@showUsersList');
    }

    function showCurrentUserInfo(){
        $user=Auth::user();
        $roles=Role::all();    
        return view('backend.users.myInfo',compact('user','roles'));
    }
    function showCurrentUserEditForm(){
        $roles=Role::all();
        $user=Auth::user();
        return view('backend.users.myEdit',compact('roles','user'));   
    }

       function selfEditUser(SelfEditUserRequest $req){
        //obtengo el usuario con la id obtenida
        $user = Auth::user();
        //modifico el usuario...
        $user->name=$req->get('name');
        if(strlen($req->get('password'))>0){
            $user->password=bcrypt($req->get('password'));
        }
        if(strlen($req->get('email'))>0){
            $user->email=$req->get('email');
        }
        $user->save();//guardo los cambios en el usuario en la base de datos
        if($user->hasRole('admin')){
            $selected_roles = $req->get('roles');
            $user->detachRoles();//quito los roles al usuario antes de re-asignarselos
            foreach ($selected_roles as $sel_r) {
                $r=Role::whereId($sel_r)->first();
                $user->attachRole($r);
            }
        }
        return redirect()->action('UsersController@showCurrentUserInfo');
    } 
}
