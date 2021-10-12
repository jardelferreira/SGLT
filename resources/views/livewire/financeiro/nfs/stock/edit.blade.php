
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar: <strong>Nota Fiscal</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nf_edit">Nº da Nota</label>
                        <input wire:model.lazy="nf" type="text" class="form-control" id="nf_edit" placeholder="Enter Name" wire:model.lazy="nf">
                        @error('nf') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="cliente_edit">Cliente</label>
                        <input wire:model.lazy="cliente" type="text" class="form-control" id="cliente_edit" placeholder="Enter Name" wire:model.lazy="cliente">
                        @error('cliente') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="cod_edit">Código</label>
                        <input wire:model.lazy="cod" type="text" class="form-control" id="cod_edit" placeholder="Enter Name" wire:model.lazy="cod">
                        @error('cod') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_edit">Tipo</label>
                        <input wire:model.lazy="tipo" type="text" class="form-control" id="tipo_edit" placeholder="Enter Name" wire:model.lazy="tipo">
                        @error('tipo') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="reference_edit">Referência</label>
                        <select class="form-control" name="reference" id="reference" wire:model.lazy="reference">
                          <option value="">Selecione</option> 
                          @foreach ($references as $value)
                            <option value="{{$value->id}}">{{$value->nf}}</option>
                            @endforeach
                          
                        </select>
                        @error('reference') <span class="text-danger error">{{ $message }}</span>@enderror
                      </div>
                    <div class="form-group">
                        <label for="val_edit">Valor total</label>
                        <input wire:model.lazy="val" type="text" class="form-control" id="val_edit" placeholder="Enter Name" wire:model.lazy="val">
                        @error('val') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                      <label for="project_edit">Projeto</label>
                      <select class="form-control" name="project_id" id="project_id" wire:model.lazy="project_id">
                        <option value="">Selecione</option> 
                        @foreach ($projects as $value)
                          <option value="{{$value->id}}" wire:model.lazy="project_id">{{$value->name}}</option>
                          @endforeach
                        
                      </select>
                      @error('project_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                        <div class="form-group">
                        <label for="desc_edit">Descrição</label>
                        <input wire:model.lazy="description" type="text" class="form-control" id="desc_edit" placeholder="Enter Name" wire:model.lazy="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Fechar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Salvar</button>
            </div>
        </div>
    </div>
</div>