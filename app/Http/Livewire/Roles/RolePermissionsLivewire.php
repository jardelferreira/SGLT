<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsLivewire extends Component
{
    public $permissions,$role, $array_permissions = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->permissions = Permission::all();
        // \dd($this->permissions);
    }

    public function render()
    {
        return \view('livewire.roles.permissions');
    }
}
