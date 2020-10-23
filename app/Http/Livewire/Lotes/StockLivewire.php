<?php

namespace App\Http\Livewire\Lotes;

use App\Models\Lote;
use Livewire\Component;

class StockLivewire extends Component
{
    public $lote, $stock, $projeto;
    public function mount(Lote $lote)
    {
        $this->lote = $lote;
        $this->projeto = $lote->projeto()->first();
    }
    public function render()
    {
        
        $this->stock = $this->lote->stock()->with('canteiroDono.trecho.lote.projeto')->get();
        return view('livewire.lotes.stock');
    }
}
