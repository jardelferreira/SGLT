<div>
    @include('livewire.sectors.stock.create')
    @include('livewire.sectors.stock.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    
    <blockquote class="blockquote">
    <p class="mb-0"><i class="fas fa-tachometer-fastest    "></i>Estoque de {{$sector->name}} 
        <i class="fa fa-arrow-right" aria-hidden="true"></i> {{$canteiro->name}}
        <button data-toggle="modal" data-target="#createModal" wire:click="create()" class="btn btn-success btn-sm"> - Cadastrar Material <i class="fa fa-plus" aria-hidden="true"></i></button>
    </p>
        <footer class="blockquote-footer"> <cite title="Source Title">{{$sector->canteiro->trecho->name}}/
             {{$lote->name}}/ {{$projeto->name}}</cite></footer>
    </blockquote>
    <hr />
    <table class="table table-striped bg-light table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nome</th>
                <th>Item</th>
                <th>Código</th>
                <th>Und.</th>
                <th>Qtd.</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($stock as $value)
            <tr>
                <td>{{ $value->id}}</td>
                <td>{{ $value->name}}</td>
                <td>{{ $value->item}}</td>
                <td>{{ $value->cod}}</td>
                <td>{{ $value->und}}</td>
                <td>{{ $value->qtd}}</td>
                <td class="row">
                    
                    <button wire:click="delete({{ $value->id}})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
