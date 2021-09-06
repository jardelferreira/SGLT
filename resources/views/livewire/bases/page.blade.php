<div>
    @include('livewire.bases.create')
    @include('livewire.bases.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <h1 class="">Projeto <i class="fa fa-arrow-right" aria-hidden="true"></i> - <strong>{{$projeto->name}}</strong></h1><hr>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus fa-lg" aria-hidden="true"> </i>  Cadastrar nova base
         </button>
         <hr>
    <table class="table table-striped bg-light table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($bases as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td class="row">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
