<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar exclusão de item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert">
                    <h4 class="alert-heading">Deletar  nome ?</h4>
                    <p class="text-danger my-1"><strong> Atenção <i class="fas fa-exclamation  fa-fw"></i></strong></p>
                    <p class="my-2">Esta ação irá remover permanantemente este item do sistema, você realmente deseja excluir?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="delete({{0}})" class="btn btn-danger" data-dismiss="modal">Excluir</button>
            </div>
       </div>
    </div>
</div>