<?php

namespace App\Http\Livewire;

use App\Models\Nf;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;


class NfLivewire extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    

    public $cliente,$nf,$cod,$tipo,$arquive,$description,$reference,$val,$project_id, $projects,$nfs;
    public $nf_id ,$references, $project, $nf_preview, $nf_deleted;

    public function mount(NF $nfs, Project $project)
    {
        // $this->authorize('admin');
        $this->projects = $project->all();
       // $this->nfs = $nfs->with('projeto')->get();
    }

    public function render()
    {
        $this->emit('dataTable');
        $this->references = Nf::where('project_id',$this->project_id)->get();
        $this->nfs = Nf::with('projeto')->get();
        return view('livewire.financeiro.nfs.stock.stock');
    }

    public function cancel()
    {
        $this->resetInputFields();
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

    public function confirmDelete(Nf $nf_deleted)
    {
     $this->nf_deleted = $nf_deleted;
 
    }

    public function loadProduct($id)
    {
       $this->nf = Nf::find($id);
    }

    public function addNf()
    {
        
         $this->validate([
            'nf' => "required|min:3|unique:nfs,nf,{$this->nf_id},id",
            'val' => 'required',
            'project_id' => 'required',
            'description' => 'nullable',
            'cod' => 'required|min:3',
            'cliente' => 'required',
            'tipo' => 'required',
            'reference' => 'numeric|nullable',
            'arquive' => 'required|mimes:pdf|max:2048'
        ]);
        // // \dd($data);
        // $this->reference = 0;
        $filename = $this->arquive->store('Nfs','public');
       if ($filename) {
           Nf::updateOrCreate(['id' => $this->nf_id], [
               'nf' => $this->nf,
               'val' => $this->val,
               'project_id' => $this->project_id,
               'description' => $this->description,
               'cod' => $this->cod,
               'cliente' => $this->cliente,
               'tipo' => $this->tipo,
               'reference' => $this->reference,
               'arquive' => $filename
           ]);
           $this->resetInputFields();
           $this->emit('closeModal');
       } else{
        
        session()->flash('message','Erro ao Salvar Arquivo');
       }

        // $this->emit('dataTable');
        session()->flash(
            'message',
            $this->nf_id ? 'Nota Atualizada com sucesso!' : 'Nota cadastrada com sucesso!'
        );
    }

    public function loadNf(Nf $nf_pre)
    {
        $this->nf_preview = $nf_pre->toArray();
        
    }

    public function delete()
    {
        
        $this->nf_deleted->delete();
        session()->flash('message', 'Produto Deleted Successfully.');
        $this->emit('closeModal');
        //$this->emit('dataTable');

    }

    public function edit(Nf $nf)
    {
        $this->nf = $nf->nf;
        $this->description = $nf->description;
        $this->cod = $nf->cod;
        $this->arquive = $nf->arquive;
        $this->tipo = $nf->tipo;
        $this->reference = $nf->reference;
        $this->cliente = $nf->cliente;
        $this->val = $nf->val;
        $this->nf_id = $nf->id;
        $this->project_id = $nf->project_id;

        
    }

    public function store()
    {
        $this->validate([
            'nf' => "required|min:3|unique:nfs,nf,{$this->nf_id},id",
            'val' => 'required',
            'project_id' => 'required',
            'description' => 'nullable',
            'cod' => 'required|min:3',
            'cliente' => 'required',
            'tipo' => 'required',
            'reference' => 'numeric|nullable',
            // 'arquive' => 'required|mimes:pdf|max:2048'
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
               'arquive' => $this->arquive,
           ]);
           
            //    $this->emit('dataTable');
               session()->flash(
                   'message',
                   $this->nf_id ? 'Nota Atualizada com sucesso!' : 'Nota cadastrada com sucesso!'
               );
           $this->resetInputFields();
           $this->emit('closeModal');
       
    }
}
