
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo Mastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="height_create">Altura:</label>
                        <input type="number" class="form-control" id="height_create" placeholder="Enter Name" wire:model.lazy="height">
                        @error('height') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="weight_create">Peso:</label>
                        <input type="number" class="form-control" id="weight_create" placeholder="Enter Name" wire:model.lazy="weight">
                        @error('weight') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="desc_create">Descrição</label>
                        <input type="text" class="form-control" id="desc_create" placeholder="Enter Name" wire:model.lazy="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Salvar</button>
            </div>
        </div>
    </div>
</div>