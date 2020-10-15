
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gerenciar Tipos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name_create">Nome</label>
                        <input type="text" class="form-control" id="name_create" placeholder="Enter Name" wire:model.lazy="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="definition_create">Definição</label>
                        <input type="text" class="form-control" id="definition_create" placeholder="Enter Name" wire:model.lazy="definition">
                        @error('definition') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                      <label for="model">Aplicação</label>
                      <select class="form-control" name="model" id="model" wire:model="model" required>
                        <option value=""  >Selecione Aplicação</option>
                        <option value="towers"  >Torres</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="desc_create">Descrição</label>
                        <input type="text" class="form-control" id="desc_create" placeholder="Enter Name" wire:model.lazy="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>