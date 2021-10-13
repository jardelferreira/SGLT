<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsLivewire extends Component
{
    public $permissions,$name,$description, $permission_id, $permission;


    public function render()
    {
        $this->emit('dataTable');
        $this->permissions = Permission::all();
        return view('livewire.permissions.page');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|string',
            'description' => 'string|nullable'
        ]);

        Permission::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        session()->flash('message','Função cadastrada com sucesso!');
        $this->emit('closeModal');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = "";
        $this->description = "";
    }

    public function delete(Permission $permission)
    {
        if (!isset($permission)) {
            $this->emit('closeModal');
            \session()->flash('message', 'Função não localizada!');
        }
        $permission->delete();
        $this->emit('closeModal');
        \session()->flash('message', 'Função excluida com sucesso!');
    }

    public function confirmDelete(Permission $permission)
    {
       $this->permission = $permission; 
       $this->name = $permission->name;
    }
}
