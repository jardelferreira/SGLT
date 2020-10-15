<div>
    @include('livewire.lotes.create')
    @include('livewire.lotes.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <h1 class="display-2">{{$projeto->name}}</h1>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus fa-lg" aria-hidden="true"> </i>  Cadastrar novo Lote
         </button>
    <table class="table table-striped bg-light table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($lotes as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td class="row">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
