<?php

namespace App\Http\Livewire;

use App\Models\Courtyard;
use App\Models\Trecho;
use Livewire\Component;

class CourtyardLivewire extends Component
{
    public $trecho, $courtyards, $name, $courtyard_id, $description, $location;
    public function mount(Trecho $trecho)
    {
        $this->trecho = $trecho;
    }
    public function render()
    {
        $this->emit('dataTable');
        $this->courtyards = $this->trecho->canteiros()->get();
        return view('livewire.courtyards.page');
    }
    public function create()
    {
        $this->resetInputFields();
        $this->emit('dataTable');
    }
  
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->location = '';
    }
     
  
    public function store()
    {
        $this->validate([
            'name' => "required|min:3",
        ]);
        Courtyard::updateOrCreate(['id' => $this->courtyard_id], [
            'name' => $this->name,
            'trecho_id' => $this->trecho->id,
            'description' => $this->description,
            'location' => $this->location
        ]);
  
        session()->flash('message',
            $this->courtyard_id ? 'Courtyard Updated Successfully.' : 'Courtyard Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');
        $this->emit('dataTable');

    }
  
    public function edit($id)
    {
        $trecho = Courtyard::find($id);
        $this->courtyard_id = $trecho->id;
        $this->name = $trecho->name;
        $this->description = $trecho->description;
        $this->location = $trecho->location;
        $this->emit('dataTable');
    }
     
  
    public function delete($id)
    {
        $trecho = Courtyard::find($id);
        $trecho->delete();
        session()->flash('message', 'Courtyard Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');
        $this->emit('dataTable');

    }
    public function cancel()
    {
        $this->emit('closeModal');
        $this->emit('dataTable');
    }
}
