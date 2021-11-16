<!--
------------------------------
MODAL : EDIT
------------------------------
Framework   :   Livewire
Styles      :   Tailwind
Icons       :   Fontawesome
Require     :   tailwind/modal-edit-footer.blade.php
-->

<!-- modal -->
<div wire:ignore.self id="modal" class="modal opacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300" role="dialog">
    <!-- modal-header -->
    <div class="px-4 py-3 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-600">
            <b>{{ $componentName }}</b> {{ $selected_id > 0 ? '| EDITAR' : '| CREAR' }}
        </h2>
        <span class="text-red-600 text-center" wire:loading>Cargando...</span>
    </div>
    <!-- modal-body -->
    <div class="w-full p-3">
