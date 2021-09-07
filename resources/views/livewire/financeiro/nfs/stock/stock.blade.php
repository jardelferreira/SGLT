<div>
    @section('title',"Gerenciamento de NFs")
        
    @include('livewire.financeiro.nfs.stock.create')
    @include('livewire.financeiro.nfs.stock.update')
    @include('livewire.financeiro.nfs.stock.delete')
    @include('livewire.financeiro.nfs.stock.nota')
    
    @include('livewire.financeiro.nfs.stock.edit')

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    
    <blockquote class="blockquote">
    <p class="mb-0"><i class="fas fa-tachometer-fastest"></i>Controle: <strong>Notas Fiscais</strong> 
        <button data-toggle="modal" data-target="#createModal" wire:click="create()" class="btn btn-success btn-sm"> - Cadastrar NF <i class="fa fa-plus" aria-hidden="true"></i></button>
    </p>
    </blockquote>
    <hr />
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>

    <table class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th>Nº</th>
                <th>NF</th>
                <th>Cliente</th>
                <th>tipo</th>
                <th>Arquivo</th>
                <th>Referência</th>
                <th>Valor total</th>
                <th>Projeto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($nfs as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nf }}</td>
                <td>{{ $value->cliente }}</td>
                <td>{{ $value->tipo }}</td>
                <td>@if ($value->arquive)
                    <button class="btn mr-1 my-1 btn-danger btn-sm ml-1" 
                    data-toggle="modal" data-target="#bd-example-modal-xl" wire:click='loadNf({{$value->id}})'>
                        <i class="fas fa-file-pdf" aria-hidden="true"></i></button></td>
                @else
                    <button class="btn mr-1 btn-warning btn-sm ">Subir nf</button>
                @endif
                <td>{{ $value->referenceNf['nf'] }}</td>
                <td>{{ $value->val }}</td>
                <td>{{ $value->projeto->name }}</td>
                <td class="row">
                    <button data-toggle="modal" wire:click='loadProduct({{$value->id}})' data-target="#photoModal"  class="btn mr-1 my-1 btn-info btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                    <button data-toggle="modal" data-target="#deleteModal" wire:click="confirmDelete({{ $value->id}})" class="btn mr-1 my-1 btn-danger btn-sm"><i class="fas fa-trash-alt fa-fw"></i></button>
                    <button data-toggle="modal" data-target="#editModal" wire:click="edit({{ $value->id}})" class="btn mr-1 my-1 btn-primary btn-sm"><i class="fas fa-edit"></i></button>                    {{-- <button wire:click="delete({{ $value->id}})" class="btn mr-1 btn-danger btn-sm">Delete</button> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
