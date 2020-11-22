<?php

namespace App\Http\Livewire\Sectors;

use App\Models\Sector;
use App\Models\Stock;
use Livewire\Component;
use Livewire\WithFileUploads;

class StockLivewire extends Component
{
    use WithFileUploads;

    public $stock, $sector, $stock_id,$product;
    public $name,$item,$cod,$qtd,$description,$und, $item_id, $photo,$storage;

    public function mount(Sector $setor)
    {
        $this->sector = $setor;
    }
    public function render()
    {
        $this->emit('dataTable');
        $this->stock = $this->sector->stock()->get();
        return view('livewire.sectors.stock.stock',[
            'setor' => $this->sector,
            'canteiro' => $this->sector->canteiro()->first(),
            'trecho' => $this->sector->canteiro()->first()->trecho()->first(),
            'lote' => $this->sector->canteiro()->first()->trecho()->first()->lote()->first(),
            'projeto' => $this->sector->canteiro()->first()->trecho()->first()->lote()->first()->projeto()->first(),
        ]);

    }
    
    public function addEstoque()
    {
        $this->validate([
            'name' => 'required|min:3',
            'item' => 'required',
            'qtd' => 'numeric|required',
            'description' => 'nullable',
            'cod' => 'required|min:3',
            'und' => 'nullable'
        ]);

        Stock::updateOrCreate(['id' => $this->stock_id], [
            'name' => $this->name,
            'item' => $this->item,
            'qtd' => $this->qtd,
            'description' => $this->description,
            'cod' => $this->cod,
            'und' => $this->und,
            'courtyard_id' => $this->sector->canteiro->id,
             'trecho_id' => $this->sector->canteiro->trecho->id,
              'lote_id' => $this->sector->canteiro->trecho->lote->id,
               'project_id' => $this->sector->canteiro->trecho->lote->projeto->id,
                'sector_id' => $this->sector->id
        ]);
        $this->resetInputFields();
        $this->emit('closeModal');
        // $this->emit('dataTable');


        session()->flash(
            'message',
            $this->stock_id ? 'Product Updated Successfully.' : 'Product Created Successfully.'
        );
    }

    public function create()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }
    public function edit($id)
    {
        $this->stock = Stock::find($id);
        $this->stock_id = $this->stock->id;
        $this->name = $this->stock->name;
        $this->description = $this->stock->description;
    }


    public function delete($id)
    {
        $this->stock = Stock::find($id);
        $this->stock->delete();
        session()->flash('message', 'Produto Deleted Successfully.');
        $this->emit('closeModal');
        //$this->emit('dataTable');

    }
    public function cancel()
    {
        $this->emit('closeModal');
        $this->emit('dataTable');

    }

    public function confirmDelete(Stock $stock)
    {
     $this->name = $stock->name;
     $this->item_id = $stock->id;   
    }

    public function loadProduct($id)
    {
       $this->product = Stock::find($id);
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ],[
            'photo.image' => 'Tipo de arquivo não compatível!',
            'photo.max'  => 'Tamanho máximo excedido, limite de 2mb'
        ]);
        
        if(!($this->product)){
            session()->flash('message', 'Produto não encontrado!');
        }else{
           $this->storage = $this->photo->store("public/projects/{$this->product->projeto()->first()->name}/products");
           
            $this->product->update(['path' => substr($this->storage,6)]);

            $this->emit('closeModal');
            session()->flash('message', 'Imagem cadastrada com succsso!');
            $this->product = false;
        }
    }

    public function addItem()
    {
        $this->product->qtd += $this->qtd;
        $this->product->update();
        $this->emit('closeModal');
            session()->flash('message', "Foram adicionados {$this->qtd} {$this->product->und} de {$this->product->name}!");
    }

    public function rmItem()
    {
        if($this->product->qtd > $this->qtd){
            $this->product->qtd -= $this->qtd;
            $this->product->update();
            $this->emit('closeModal');
                session()->flash('message', "Foram removidos {$this->qtd} {$this->product->und} de {$this->product->name}!");
        }else{
            session()->flash('message', "Você não tem itens suficientes!");
        }

    }
}
