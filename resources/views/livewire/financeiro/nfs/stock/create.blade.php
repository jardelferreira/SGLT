
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Cadastrar: <strong>Nota Fiscal</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nf_create">Nº da Nota</label>
                        <input type="text" class="form-control" id="nf_create" placeholder="Enter Name" wire:model.lazy="nf">
                        @error('nf') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="cliente_create">Cliente</label>
                        <input type="text" class="form-control" id="cliente_create" placeholder="Enter Name" wire:model.lazy="cliente">
                        @error('cliente') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="cod_create">Código</label>
                        <input type="text" class="form-control" id="cod_create" placeholder="Enter Name" wire:model.lazy="cod">
                        @error('cod') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_create">Tipo</label>
                        <input type="text" class="form-control" id="tipo_create" placeholder="Enter Name" wire:model.lazy="tipo">
                        @error('tipo') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="reference_create">Referência</label>
                        <input type="number" class="form-control" id="reference_create" placeholder="Enter Name" wire:model.lazy="reference">
                        @error('reference') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="val_create">Valor total</label>
                        <input type="text" class="form-control" id="val_create" placeholder="Enter Name" wire:model.lazy="val">
                        @error('val') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                      <label for="project_create">Projeto</label>
                      <select class="form-control" name="project_id" id="project_id" wire:model.lazy="project_id">
                        <option value="">Selecione</option> 
                        @foreach ($projects as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                        
                      </select>
                      @error('project_id') <span class="text-danger error">{{ $message }}</span>@enderror
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
                <button type="button" wire:click.prevent="addNf()" class="btn btn-primary close-modal">Salvar</button>
            </div>
        </div>
    </div>
</div>