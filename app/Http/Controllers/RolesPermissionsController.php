<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;
use App\Permission;

class RolesPermissionsController extends Controller{
    function showTable(){
    	$roles=Role::orderBy('name')->get();
    	$perms=Permission::orderBy('name')->get();
    	return view('backend.rolesPermissions.roles_x_permissions',compact('roles','perms'));
    }

    function showRoleEditForm($roleName){
    	return "edit_role_form";
    }

    function showPermissionEditForm($permName){
    	return "edit_permission_form";
    }
}
