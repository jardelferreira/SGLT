<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;

class TypeLivewire extends Component
{
    public $types, $definition, $name, $type_id, $sub, $model, $description;

    public function render()
    {
        $this->types = Type::all();
        return view('livewire.types.page');
    }
    public function create()
    {
        $this->resetInputFields();
    }
  
    private function resetInputFields(){
        $this->name = '';
    }
     
  
    public function store()
    {
        $this->validate([
            'name' => "required|min:3",
            'model' => "required|min:3",
        ]);
        Type::updateOrCreate(['id' => $this->type_id], [
            'name' => $this->name,
            'model' => $this->model,
            'sub' => $this->sub,
            'definition' => $this->definition,
            'description' => $this->description,
        ]);
  
        session()->flash('message',
            $this->type_id ? 'Type Updated Successfully.' : 'Type Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
    }
  
    public function edit($id)
    {
        $type = Type::find($id);
        $this->type_id = $type->id;
        $this->name = $type->name;
        $this->definition = $type->definition;
        $this->description = $type->description;
    }
     
  
    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();
        session()->flash('message', 'Type Deleted Successfully.');
        $this->emit('closeModal');
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
