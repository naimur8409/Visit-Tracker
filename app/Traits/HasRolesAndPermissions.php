<?php
namespace App\Traits;

use App\Role;
use App\Permission;
use App\Visitor;
trait HasRolesAndPermissions
{
    /**
     * Roles
     */
    public function visitors()
    {
        return $this->belongsToMany(Visitor::class,'user_visitor');
    }
    

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    /**
     * permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_user');
    }

    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    /**
     * @param $permission
     * @return bool
     */

    public function hasPermission(... $permissions ) {
        foreach ($permissions as $permission) {
            if ($this->permissions->contains('name', $permission)) {
                return true;
            }
        }
        return false;
    }
    // public function hasPermission($permission)
    // {
    //     return (bool) $this->permissions->where('slug', $permission->slug)->count();
    // }

    /**
     * @param $permission
     * @return bool
     */
   public function hasPermissionTo($permission)
    {
       return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name',$permissions)->get();
    }

    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function givePermissionsTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(... $permissions )
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return HasRolesAndPermissions
     */
    public function refreshPermissions(... $permissions )
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
            

    }