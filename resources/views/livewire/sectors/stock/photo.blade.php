<div wire:ignore.self class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@if($product){{$product->name}}@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
                @if ($photo)
            @endif
            @if ($product)
            Imagem do produto:
            <img src="{{ asset("storage/{$product->path}") }}">
            @else
            @if ($photo)
            Imagem preview:
            <img src="{{ $photo->temporaryUrl() }}">
            @else
            <h6>Produto sem imagem</h6>
            @endif
            @endif
            </div>
            <div class="modal-footer">
                @error('photo') <span class="alert alert-danger">{{ $message }}</span> @enderror
                <p class="col-12">@if($product){{$product->description}}@endif</p>
                <form wire:submit.prevent="save">
                    <input type="file" wire:model="photo">
                    <button type="submit" class="btn btn-sm btn-warning">salvar</button>
                </form>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">fechar</button>
            </div>
        </div>
    </div>
</div>