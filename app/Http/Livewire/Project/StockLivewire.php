<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class StockLivewire extends Component
{
    public $projeto, $stock;

    public function mount(Project $projeto)
    {
        $this->projeto = $projeto;
    }

    public function render()
    {
        $this->stock = $this->projeto->stock()->with('canteiroDono')->get();
        return view('livewire.project.stock');
    }
}
