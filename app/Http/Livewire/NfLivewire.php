<?php

namespace App\Http\Livewire;

use App\Models\Nf;
use App\Models\Project;
use Livewire\Component;

class NfLivewire extends Component
{
    public $cliente,$nf,$cod,$tipo,$arquive,$description,$reference,$val,$project_id, $projects,$nfs;
    public $nf_id;

    public function mount(NF $nfs, Project $project)
    {
        $this->projects = $project->all();
       // $this->nfs = $nfs->with('projeto')->get();
    }

    public function render()
    {
        $this->emit('dataTable');
        $this->nfs = Nf::with('projeto')->get();
        return view('livewire.financeiro.nfs.stock.stock');
    }

    public function create()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nf = '';
        $this->description = '';
        $this->cod = "";
        $this->arquive = "";
        $this->tipo = "";
        $this->reference = "";
        $this->cliente = "";
        $this->val = "";
        
    }

    public function confirmDelete(Nf $nf)
    {
     $this->nf = $nf->nf;
 
    }

    public function loadProduct($id)
    {
       $this->nf = Nf::find($id);
    }

    public function addNf()
    {
        $this->validate([
            'nf' => 'required|min:3',
            'val' => 'required',
            'project_id' => 'required',
            'description' => 'nullable',
            'cod' => 'required|min:3',
            'cliente' => 'required',
            'tipo' => 'required',
            'reference' => 'numeric|nullable'
        ]);

        Nf::updateOrCreate(['id' => $this->nf_id], [
            'nf' => $this->nf,
            'val' => $this->val,
            'project_id' => $this->project_id,
            'description' => $this->description,
            'cod' => $this->cod,
            'cliente' => $this->cliente,
            'tipo' => $this->tipo,
            'reference' => $this->reference,
        ]);
        $this->resetInputFields();
        $this->emit('closeModal');
        // $this->emit('dataTable');


        session()->flash(
            'message',
            $this->nf_id ? 'Nota Atualizada com sucesso!' : 'Nota cadastrada com sucesso!'
        );
    }

}
