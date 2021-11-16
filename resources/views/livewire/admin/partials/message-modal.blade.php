@include('common.bootstrap.modal-show-header')
    <div class="row">
        <div class="container">
            <div class="col-sm-12">
                <span wire:model="name">De: {{ $name }}</span><br>
                @if(isset($created_at))
                    <span wire:model="created_at">Recibido el: {{ $created_at }}</span>
                @endif
                @if(isset($updated_at))
                    <span wire:model="updated_at">Recibido el: {{ $updated_at }}</span>
                @endif
                <hr>
            </div>
            <div class="col-sm-12 mt-4">
                <span wire:model="message">{{ $message }}</span>
            </div>
            <div class="col-sm-12 mt-4">
                <span class="mb-6">Atentamente,</span><br><br><br>
                <span wire:model="name">{{ $name }}</span><br>
                <span wire:model="email">{{ $email }}</span><br>
                <span wire:model="phone">{{ $phone }}</span>
            </div>
        </div>
    </div>
@include('common.bootstrap.modal-show-footer')
