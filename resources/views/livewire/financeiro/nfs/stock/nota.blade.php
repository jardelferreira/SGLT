<div wire:ignore.self class="modal fade bd-example-modal-xl" id="bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> 
      <div class="modal-content">

       <embed height="100%" src="{{ asset("storage/{$nf_preview['arquive']}")}}"  type="application/pdf" >

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
</style>