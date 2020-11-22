<?php

namespace App\Http\Livewire\Trechos;

use App\Models\Trecho;
use Livewire\Component;

class StockLivewire extends Component
{
    public $trecho, $stock, $lote, $projeto;

    public function mount(Trecho $trecho)
    {
        $this->trecho = $trecho; 
    }
    public function render()
    {
        $this->lote = $this->trecho->lote()->first();
       $this->stock = $this->trecho->stock()->with('setorDono.canteiro')->get();
       $this->projeto = $this->trecho->lote()->with('projeto')->first();
        return view('livewire.trechos.stock');
    }
}
