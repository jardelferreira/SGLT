<div>
    @include('livewire.lotes.create')
    @include('livewire.lotes.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <div class="form-group d-flex col-12">
        <div class="col-4">
            <input type="text" class="form-control" name="filter" id="filter" aria-describedby="helpId" placeholder="pequisar...">
        </div>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Pesquisar</button>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Cadastrar novo lote
         </button>
    <table class="table table-striped bg-light mt-2" id="lote_table">
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
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
