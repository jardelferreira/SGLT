<?php

namespace App\Http\Livewire;

use App\Models\Lote;
use App\Models\Trecho;
use Livewire\Component;

class TrechoLivewire extends Component
{
    public $lote, $trechos, $name, $trecho_id;
    public function mount(Lote $lote)
    {
        $this->lote = $lote;
    }
    public function render()
    {
        $this->emit('dataTable');
        $this->trechos = $this->lote->trechos()->get();
        return view('livewire.trechos.page');
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
        Trecho::updateOrCreate(['id' => $this->trecho_id], [
            'name' => $this->name,
            'lote_id' => $this->lote->id
        ]);
  
        session()->flash('message',
            $this->trecho_id ? 'Trecho Updated Successfully.' : 'Trecho Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
  
    public function edit($id)
    {
        $lote = Trecho::find($id);
        $this->trecho_id = $lote->id;
        $this->name = $lote->name;
    }
     
  
    public function delete($id)
    {
        $lote = Trecho::find($id);
        $lote->delete();
        session()->flash('message', 'Trecho Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
    public function cancel()
    {
        $this->emit('closeModal');
        $this->emit('dataTable');
    }
}
