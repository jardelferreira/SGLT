<?php

namespace App\Http\Livewire;

use App\Models\Courtyard;
use App\Models\Sector;
use Livewire\Component;

class SectorLivewire extends Component
{
    public $sectors, $name,$description, $sector_id, $canteiro;

    public function mount(Courtyard $canteiro)
    {
        $this->canteiro = $canteiro;
    }
    public function render()
    {
        $this->sectors = $this->canteiro->sectors()->get();;
        return view('livewire.sectors.page');
    }

    public function create()
    {
        $this->resetInputFields();
    }
  
  
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    
    }
     
    public function store()
    {
        $this->validate([
            'name' => "required|min:3|unique:sectors,name,{$this->sector_id},id",
            'description' => 'required',
        ]);
        Sector::updateOrCreate(['id' => $this->sector_id], [
            'name' => $this->name,
            'description' => $this->description,
            'courtyard_id' => $this->canteiro->id
        ]);
  
        session()->flash('message',
            $this->sector_id ? 'Sector Updated Successfully.' : 'Sector Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
  
    public function edit($id)
    {
        $sector = Sector::find($id);
        $this->sector_id = $sector->id;
        $this->name = $sector->name;
        $this->description = $sector->description;

    }
     
  
    public function delete($id)
    {
        $sector = Sector::find($id);
        $sector->delete();
        session()->flash('message', 'Sector Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
