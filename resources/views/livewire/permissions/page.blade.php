<div>
    @if (session()->has('message'))
    <div class="alert alert-success" z-index="100" style="margin-top:30px;">
      {{ session('message') }}
    </div>
@endif

@include('livewire.permissions.create')
@include('livewire.permissions.delete')

<blockquote class="blockquote">
<p class="mb-0"><i class="fas fa-tachometer-fastest    "></i>Cadastro de Funções 
    <i class="fa fa-arrow-right" aria-hidden="true"></i> Projeto
    <button class="btn btn-success" wire:click="resetInputs()" data-toggle="modal" data-target="#createModal">Cadastrar nova Permissão</button>
</p>
    <footer class="blockquote-footer"> <cite title="Source Title"></cite>Projeto</footer>
</blockquote>
<hr />
    <table class="table table-striped bg-light mt-2 table-responsive">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                {{-- <td><i class="fa fa-book" aria-hidden="true"></i></td> --}}
                <td class="row">
                <button data-toggle="modal" data-target="#deleteModal" wire:click="confirmDelete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
