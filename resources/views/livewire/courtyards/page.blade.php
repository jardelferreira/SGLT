<div>
    @include('livewire.courtyards.create')
    @include('livewire.courtyards.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <div class="form-group d-flex col-12">
        <h1 class="">Trecho <i class="fa fa-arrow-right" aria-hidden="true"></i> - <strong>{{$trecho->name}}</strong></h1><hr>
    </div>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus fa-lg" aria-hidden="true"> </i>  Cadastrar novo Canteiro
            </button>
    <table class="table table-striped bg-light mt-2 table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nome</th>
                <th>Localização</th>
                <th>Descrição</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courtyards as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->location }}</td>
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
