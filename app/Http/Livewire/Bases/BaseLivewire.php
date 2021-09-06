<?php

namespace App\Http\Livewire\Bases;

use App\Models\Base;
use App\Models\Project;
use Livewire\Component;

class BaseLivewire extends Component
{
    public $projeto,$bases, $name, $description, $base_id;

    public function mount(Project $projeto)
    {
        $this->projeto = $projeto;
    }
 
    public function render()
    {
        $this->emit('DataTable');
        $this->bases = $this->projeto->bases;
        return view('livewire.bases.page');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->emit('dataTable');
    }
  
    private function resetInputFields(){
        $this->name = '';
    }
     
  
    public function store()
    {
        $this->validate([
            'name' => "required|min:3",
            'description' => 'required|min:5'
        ]);
        Base::updateOrCreate(['id' => $this->base_id], [
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $this->projeto->id
        ]);
  
        session()->flash('message',
            $this->base_id ? 'Base Updated Successfully.' : 'Base Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
  
    public function edit($id)
    {
        $base = Base::find($id);
        $this->base_id = $base->id;
        $this->name = $base->name;
        $this->description = $base->description;
    }
     
  
    public function delete($id)
    {
        $base = Base::find($id);
        $base->delete();
        session()->flash('message', 'Base Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
    public function cancel()
    {
        $this->emit('closeModal');
        $this->emit('dataTable');
    }
}
