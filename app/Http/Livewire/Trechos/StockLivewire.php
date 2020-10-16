<?php

namespace App\Http\Livewire\Trechos;

use App\Models\Trecho;
use Livewire\Component;

class StockLivewire extends Component
{
    public $trecho, $stock, $lote, $projeto;

    public function mount(Trecho $trecho)
    {
       //dd($trecho->lote()->with('projeto')->first()->projeto->name);
        $this->trecho = $trecho;
    }
    public function render()
    {
        $this->lote = $this->trecho->lote()->first();
        //dd($this->lote);
       $this->stock = $this->trecho->stock()->with('canteiroDono')->get();
       $this->projeto = $this->trecho->lote()->with('projeto')->first();
        return view('livewire.trechos.stock');
    }
}
