<div>
    @include('livewire.financeiro.nfs.create')
    @include('livewire.financeiro.nfs.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    <div class="form-group d-flex col-12">
        <h1 class="">Financeiro <i class="fa fa-arrow-right" aria-hidden="true"></i> - <strong>Controle de Notas Fiscais</strong></h1><hr>
        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus fa-lg" aria-hidden="true"> </i>  Cadastrar NF
        </button>
    </div>
    <hr>
    <table class="table table-striped bg-light mt-2 table-responsive">
        <thead>
            <tr>
                <th>NF</th>
                <th>Cliente</th>
                <th>tipo</th>
                <th>Arquivo</th>
                <th>Referência</th>
                <th>Valor total</th>
                <th>Projeto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nfs as $value)
            <tr>
                <td>{{ $value->nf }}</td>
                <td>{{ $value->client }}</td>
                <td>{{ $value->tipo }}</td>
                <td>{{ $value->arquive }}</td>
                <td>{{ $value->val }}</td>
                <td>{{ $value->project }}</td>
                <td class="row">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
