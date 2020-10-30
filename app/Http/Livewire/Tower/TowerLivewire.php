<?php

namespace App\Http\Livewire\Tower;

use App\Models\Project;
use App\Models\Tower;
use App\Models\Trecho;
use Livewire\Component;

class TowerLivewire extends Component
{
    public $project, $towers, $lotes, $tower, $trecho;
    public $name,$trecho_id, $tower_id;

    public function mount(Project $projeto)
    {
        $this->project = $projeto;
    }
    public function render()
    {
        $this->towers = $this->project->torres()->with('trecho')->get();
        //dd($this->towers);
        $this->lotes = $this->project->lotes()->with('trechos')->get();
        $this->emit('dataTable');
        return view('livewire.tower.page');
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
        ]);

        $this->trecho = Trecho::find($this->trecho_id);
          //dd($this->trecho->lote->projeto->first()->id);
        Tower::updateOrCreate(['id' => $this->tower_id], [
            'name' => $this->name,
            'project_id' => $this->trecho->lote->projeto->first()->id,
            'lote_id' => $this->trecho->lote->first()->id,
            'trecho_id' => $this->trecho->id,
        ]);
  
        session()->flash('message',
            $this->tower_id ? 'Tower Updated Successfully.' : 'Tower Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');
        $this->emit('dataTable');

    }
  
    public function edit($id)
    {
        $tower = Tower::find($id);
        $this->tower_id = $tower->id;
        $this->name = $tower->name;
        $this->trecho_id = $tower->trecho_id;
        $this->emit('dataTable');
    }
     
  
    public function delete($id)
    {
        $tower = Tower::find($id);
        $tower->delete();
        session()->flash('message', 'Tower Deleted Successfully.');
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
