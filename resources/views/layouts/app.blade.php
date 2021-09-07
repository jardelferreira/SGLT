@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=0.5">

@stop

@section('content')

    <!-- Page Content -->
    <main>
        {{ $slot }}
        
    </main>


    @stack('modals')
@stop

@section('css')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')

    @livewireScripts
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script> --}}
    <script type="text/javascript">
        livewire.on('closeModal', () => {
            $('.modal').modal('hide');
            setTimeout(() => {
                $('.alert').fadeOut(2000);
            }, 2000);
        });
        livewire.on('menuUpdate', () => {
            location.reload();
        })
        livewire.on('dataTable', () => {
            $('table').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50,100, -1],
                    ['10 linhas', '25 linhas', '50 linhas','100 lihas','mostrar tudo']
                ],
                buttons: ['pageLength','colvis','copy', 'csv', 'excel','pdf','print']
            });
        })
        
    </script>
    <script>
        $(document).ready(function() {
            $('#bd-example-modal-xl').on('hidden.bs.modal', function (e) {
                location.reload()
            })
            $('table').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50,100, -1],
                    ['10 linhas', '25 linhas', '50 linhas','100 lihas','mostrar tudo']
                ],
                buttons: ['pageLength','colvis','copy', 'csv', 'excel','pdf','print']
            });

        });

    </script>
@stop
