
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="uuid">
                        <label for="name_update">Name</label>
                        <input type="text" class="form-control" wire:model.lazy="name" id="name_update" placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="definition_create">Definição</label>
                        <input type="text" class="form-control" id="definition_create" placeholder="Enter Name" wire:model.lazy="definition">
                        @error('definition') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                      <label for="model">Aplicação</label>
                      <select class="form-control" name="model" id="model" wire:model="model">
                        <option value=""  >Selecione Aplicação</option>
                        @foreach ($models_type as $value)
                        <option value="{{$value}}"  >{{$value}}</option>
                        @endforeach>
                      </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="description">
                        <label for="desc_update">descrição</label>
                        <input type="text" class="form-control" wire:model.lazy="description" id="desc_update" placeholder="Enter description">
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>