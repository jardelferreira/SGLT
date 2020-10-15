<?php

namespace App\Http\Livewire\Sectors;

use App\Models\Sector;
use App\Models\Stock;
use Livewire\Component;

class StockLivewire extends Component
{
    public $stock, $sector, $stock_id;
    public $name,$item,$cod,$qtd,$description,$und;

    public function mount(Sector $setor)
    {
        $this->sector = $setor;
    }
    public function render()
    {
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
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
