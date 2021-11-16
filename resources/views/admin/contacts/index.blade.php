@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <h1 class="text-dark">Mensajes</h1> --}}
@stop

@section('content')
    @livewire('admin.contacts-messages')
@stop

@yield('modal')

@section('js')
    <script src="{{ asset('js/admin/contacts/all.js') }}"></script>
@stop

@section('adminlte_js')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    // SweetAlert on delete Module/Section
    window.addEventListener('swal:deletemessageconfirm', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
        })
        .then((willDeleteMessage) => {
            if(willDeleteMessage) {
                window.livewire.emit('destroy', event.detail.id);
            }
        });
    });
</script>
@stop
