<?php

namespace App\Http\Livewire;

use App\Models\Lote;
use App\Models\Project;
use Livewire\Component;

class LoteLivewire extends Component
{
    public $lotes, $name,$lote_id, $projeto;

    public function mount(Project $projeto)
    {
        $this->projeto = $projeto;
    }
    public function render()
    {
        $this->lotes = Lote::all();
        return view('livewire.lotes.page');
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
        ]);
        Lote::updateOrCreate(['id' => $this->lote_id], [
            'name' => $this->name,
            'project_id' => $this->projeto->id
        ]);
  
        session()->flash('message',
            $this->lote_id ? 'Lote Updated Successfully.' : 'Lote Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
    }
  
    public function edit($id)
    {
        $lote = Lote::find($id);
        $this->lote_id = $lote->id;
        $this->name = $lote->name;
    }
     
  
    public function delete($id)
    {
        $lote = Lote::find($id);
        $lote->delete();
        session()->flash('message', 'Lote Deleted Successfully.');
        $this->emit('closeModal');
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
