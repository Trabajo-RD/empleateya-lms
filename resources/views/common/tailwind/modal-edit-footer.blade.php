<!--
------------------------------
MODAL : EDIT
------------------------------
Framework   :   Livewire
Styles      :   Tailwind
Icons       :   Fontawesome
Require     :   tailwind/modal-edit-header.blade.php
-->

</div>
        <!-- end body -->

        <!-- footer -->
        <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
            <button type="button" class="bg-white-100 hover:bg-white-200 px-4 py-2 rounded text-gray-700 border-gray-700 focus:outline-none" data-dismiss="modal" wire:click.prevent="resetUI()">CERRAR</button>

            @if($selected_id < 1 )
                <button type="button" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none" wire:click.prevent="Store()">GUARDAR</button>
            @else
                <button type="button" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none" wire:click.prevent="Update()">ACTUALIZAR</button>
            @endif
        </div>
    </div>

</div>
