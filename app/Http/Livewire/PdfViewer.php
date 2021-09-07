<?php

namespace App\Http\Livewire;

use App\Models\Nf;
use Livewire\Component;

class PdfViewer extends Component
{
    public $nf;

    public function mount(Nf $nf)
    {
        $this->nf = $nf;    
    }
    public function render()
    {
        return view('livewire.pdf-viewer');
    }
}
