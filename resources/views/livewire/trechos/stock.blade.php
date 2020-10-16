<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success" style="margin-top:30px;">
              {{ session('message') }}
            </div>
        @endif
        
        <blockquote class="blockquote">
        <p class="mb-0"><i class="fas fa-tachometer-fastest    "></i>Estoque de {{$trecho->name}} 
            <i class="fa fa-arrow-right" aria-hidden="true"></i> {{$projeto->projeto->name}}
        </p>
            <footer class="blockquote-footer"> <cite title="Source Title">{{$lote->name}} / {{$projeto->projeto->name}}</cite></footer>
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
                    <th>Canteiro</th>
                    {{-- <th>Actions</th> --}}
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
                    <td>{{ $value->canteiroDono->name}}</td>
                    {{-- <td class="row">
                        
                        <button wire:click="delete({{ $value->id}})" class="btn btn-danger btn-sm">Delete</button>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
</div>
