
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Cadastrar Material em <strong>{{$sector->name}}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name_create">Nome:</label>
                        <input type="text" class="form-control" id="name_create" placeholder="Enter Name" wire:model.lazy="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="item_create">Item:</label>
                        <input type="text" class="form-control" id="item_create" placeholder="Enter Name" wire:model.lazy="item">
                        @error('item') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="cod_create">Código:</label>
                        <input type="text" class="form-control" id="cod_create" placeholder="Enter Name" wire:model.lazy="cod">
                        @error('cod') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="und_create">Unidade:</label>
                        <input type="text" class="form-control" id="und_create" placeholder="Enter Name" wire:model.lazy="und">
                        @error('und') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="qtd_create">Quantidade:</label>
                        <input type="number" class="form-control" id="qtd_create" placeholder="Enter Name" wire:model.lazy="qtd">
                        @error('qtd') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="desc_create">Descrição</label>
                        <input type="text" class="form-control" id="desc_create" placeholder="Enter Name" wire:model.lazy="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Fechar</button>
                <button type="button" wire:click.prevent="addEstoque()" class="btn btn-success close-modal">Salvar</button>
            </div>
        </div>
    </div>
</div>