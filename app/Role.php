<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;

use App\Permission;
class Role extends Model{
    use NtrustRoleTrait;
    /*
     * Role profile to get value from ntrust config file.
     */
    protected $roleProfile = 'user';

    public function hasPermission($permName){
    	$res=false;
    	foreach($this->perms as $p){
    		if($p->name == $permName){
    			$res= true;
    			break;
    		}
    	}
    	return $res;
	}
}