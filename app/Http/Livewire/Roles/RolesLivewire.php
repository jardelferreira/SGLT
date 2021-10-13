<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesLivewire extends Component
{
    public $roles,$name,$description, $role_id, $role;


    public function render()
    {
        $this->emit('dataTable');
        $this->roles = Role::all();
        return view('livewire.roles.page');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|string',
            'description' => 'string|nullable'
        ]);

        Role::create([
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

    public function delete(Role $role)
    {
        if (!isset($role)) {
            $this->emit('closeModal');
            \session()->flash('message', 'Função não localizada!');
        }
        $role->delete();
        $this->emit('closeModal');
        \session()->flash('message', 'Função excluida com sucesso!');
    }

    public function confirmDelete(Role $role)
    {
       $this->role = $role; 
       $this->name = $role->name;
    }
}
