<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectLivewire extends Component
{
    public $projects, $name,$description, $project_id;

    public function render()
    {
        $this->projects = Project::all();
        return view('livewire.projects.page');
    }

    public function create()
    {
        $this->resetInputFields();
    }
  
  
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    
    }
     
    public function store()
    {
        $this->validate([
            'name' => "required|min:3|unique:projects,name,{$this->project_id},id",
            'description' => 'required',
        ]);
        Project::updateOrCreate(['id' => $this->project_id], [
            'name' => $this->name,
            'description' => $this->description
        ]);
  
        session()->flash('message',
            $this->project_id ? 'Project Updated Successfully.' : 'Project Created Successfully.');

        $this->resetInputFields();
        $this->emit('closeModal');
        $this->emit('menuUpdate');

    }
  
    public function edit($id)
    {
        $project = Project::find($id);
        $this->project_id = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;

    }
     
  
    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        session()->flash('message', 'Project Deleted Successfully.');
        $this->emit('closeModal');
        $this->emit('menuUpdate');
    }
    public function cancel()
    {
        $this->emit('closeModal');
    }
}
