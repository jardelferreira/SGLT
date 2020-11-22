<div wire:ignore.self class="modal fade" id="rmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@if($product){{$product->name}}@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
                @if (session()->has('message'))
                    <div class="alert alert-danger" style="margin-top:30px;">
                    {{ session('message') }}
                    </div>
                @endif
                @if($product)<h3 class="align-self-center">Temos {{$product->qtd}} {{$product->und}}, em estoque</h3><hr>@endif
                <div class="form-group">
                  <label for="qtd">informe a quantidade a ser removida</label>
                  <input type="number" step="0.1"
                    class="form-control" wire:model='qtd' name="qtd" id="qtd" aria-describedby="addId" placeholder="ex: 100">
                  <small id="addId" class="form-text text-muted">informe um valor</small>
                </div>
                <button type="button" wire:click='rmItem()' class="btn btn-danger">Retirar</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
            </div>
        </div>
    </div>
</div>