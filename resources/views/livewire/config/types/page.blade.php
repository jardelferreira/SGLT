<div>
    @include('livewire.config.types.create')
    @include('livewire.config.types.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <div class="form-group d-flex col-12">
        <div class="col-4">
            <input type="text" class="form-control" name="filter" id="filter" aria-describedby="helpId" placeholder="pequisar...">
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
       Adicionar Tipos
        </button>
    </div>
    <table class="table table-striped bg-light mt-2 table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>definition</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->definition }}</td>
                <td  class="row">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
