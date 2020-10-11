<?php

namespace App\Http\Livewire;

use App\Models\Mast;
use Livewire\Component;

class MastLivewire extends Component
{
    public $masts, $mast_id, $height, $weight, $description;
    public function render()
    {
        $this->masts = Mast::all();
        return view('livewire.config.masts.page');
    }

    public function create()
    {
        $this->resetInputFields();
    }
  
    private function resetInputFields(){
        $this->height = '';
        $this->weight = '';
        $this->description = '';
    }
     
  
    public function store()
    {
        $this->validate([
            'height' => "required|numeric",
        ]);
        Mast::updateOrCreate(['id' => $this->mast_id], [
            'height' => $this->height,
            'weight' => $this->weight,
            'description' => $this->description,
        ]);
  
        session()->flash('message',
            $this->mast_id ? 'Mast Updated Successfully.' : 'Mast Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
    }
  
    public function edit($id)
    {
        $mast = Mast::find($id);
        $this->mast_id = $mast->id;
        $this->height = $mast->height;
        $this->weight = $mast->weight;
        $this->description = $mast->description;
    }
     
  
    public function delete($id)
    {
        $mast = Mast::find($id);
        $mast->delete();
        session()->flash('message', 'Mast Deleted Successfully.');
        $this->emit('closeModal');
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
