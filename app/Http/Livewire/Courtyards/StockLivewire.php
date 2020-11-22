<?php

namespace App\Http\Livewire\Courtyards;

use App\Models\Courtyard;
use Livewire\Component;

class StockLivewire extends Component
{
    public $courtyard, $stock, $projeto;
    public function mount(Courtyard $canteiro)
    {
        $this->courtyard = $canteiro;
        $this->projeto = $this->courtyard->trecho->lote->projeto;
       // dd($this->projeto);
    }
    public function render()
    {
        
        $this->stock = $this->courtyard->stock()->with('setorDono')->get();
        return view('livewire.courtyards.stock');
    }
}
