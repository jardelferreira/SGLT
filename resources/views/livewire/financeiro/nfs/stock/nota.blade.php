<div wire:ignore.self class="modal fade bd-example-modal-xl" id="bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nota fiscal:{{$nf_preview['nf']}} - Nº {{$nf_preview['cod']}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="loader"></div>
        <div class="modal-body">
          <embed height="100%" id="nf_load" width="100%" src="{{ asset("storage/{$nf_preview['arquive']}")}}"  type="application/pdf" >
      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger"  data-dismiss="modal">Fechar visualização</button>
        </div>

      </div>
    </div>
  </div>
  <script>
 
  </script>
<style>
#bd-example-modal-xl {
  padding: 0 !important; // override inline padding-right added from js
}
#bd-example-modal-xl .modal-dialog {
  width: 100%;
  max-width: none;
  height: 100%;
  margin: 0;
}
#bd-example-modal-xl .modal-content {
  height: 100%;
  border: 0;
  border-radius: 0;
}
.modal .modal-body {
  overflow-y: auto;
}

.loader {
  border-top: 32px solid blue;
  border-right: 32px solid green;
  border-bottom: 32px solid red;
  border-left: 32px solid yellow;
  border-radius: 50%;
  width: 240px;
  height: 240px;
  animation: spin 2s linear infinite;
  position: absolute;
  left: calc(50% - 120px);
  top: calc(50% - 120px);
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>