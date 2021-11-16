<!--
------------------------------
MODAL : SHOW
------------------------------
Framework   :   Livewire
Styles      :   Bootstrap
Icons       :   Fontawesome
Require     :   bootstrap/modal-show-footer.blade.php
-->

<div wire:ignore.self id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <!-- modal-header -->
        <div class="modal-header">
          <h5 class="modal-title">
              <b>{{ $componentName }}</b> {{ $selected_id > 0 ? '| MOSTRAR' : '' }}
          </h5>
          <span class="text-danger text-center" wire:loading>Cargando...</span>
        </div>
        <!-- modal-body -->
        <div class="modal-body">
