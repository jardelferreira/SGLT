<?php

namespace App\Http\Livewire;

use App\Models\Lote;
use App\Models\Project;
use Livewire\Component;

class LoteLivewire extends Component
{
    public $lotes, $name,$lote_id, $projeto,$project_lotes;

    public function mount(Project $projeto)
    {
        // $this->project_lotes = $projeto->lotes()->get();
        $this->projeto = $projeto;
    }

    public function render()
    {
        $this->lotes = $this->projeto->lotes()->get();
        return view('livewire.lotes.page');
    }

    public function getSubmenu(array $menu, $model)
    {
        $modelo = [
            'text' => $model->name,
            'url' => '#',
            'submenu' => [
                    [
                        'text' => 'Gerenciar',
                        'url' => '#'
                    ]
                ]
                ];   
                array_push($menu,$modelo);
                foreach ($menu as $key => $value) {
                  
                }        
       
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
        $this->emit('menuUpdate');

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
        $this->emit('menuUpdate');

    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
