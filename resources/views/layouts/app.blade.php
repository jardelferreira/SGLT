@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
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

    </script>
    <script>
        // $(document).ready(function() {
        //     $('table').DataTable();
        // });
        $(document).ready( function () {
			$('table')
				.addClass( 'nowrap' )
				.dataTable( {
					responsive: true,
					columnDefs: [
						{ targets: [-1, -3], className: 'dt-body-right' }
					]
				} );
		} );
    </script>
@stop
@section(' plugins.Datatables ', true)
