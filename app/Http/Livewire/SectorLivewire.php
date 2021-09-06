<?php

namespace App\Http\Livewire;

use App\Models\Base;
use App\Models\Sector;
use App\Models\Stock;
use Livewire\Component;

class SectorLivewire extends Component
{
    public $sectors, $name, $description, $sector_id, $base, $stock, $sector;

    public function mount(Base $base)
    {
        $this->base = $base;
    }
    public function render()
    {
        $this->emit('dataTable');
        $this->sectors = $this->base->sectors()->get();
        return view('livewire.sectors.page');
    }

    public function painel(Sector $setor)
    {
        $this->emit('dataTable');
        return view('livewire.sectors.painel', [
            'setor' => $setor->with('base')->get()
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->emit('dataTable');
    }


    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'name' => "required|min:3",
            'description' => 'required',
        ]);
        Sector::updateOrCreate(['id' => $this->sector_id], [
            'name' => $this->name,
            'description' => $this->description,
            'base_id' => $this->base->id
        ]);

        session()->flash(
            'message',
            $this->sector_id ? 'Sector Updated Successfully.' : 'Sector Created Successfully.'
        );

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');
    }

    public function edit($id)
    {
        $this->sector = Sector::find($id);
        $this->sector_id = $this->sector->id;
        $this->name = $this->sector->name;
        $this->description = $this->sector->description;
    }


    public function delete($id)
    {
        $this->sector = Sector::find($id);
        $this->sector->delete();
        session()->flash('message', 'Sector Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');
    }
    public function cancel()
    {
        $this->emit('closeModal');
        $this->emit('dataTable');
    }
}
