@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    @inject('estados', 'App\Services\estados')

    <body class="container">

        <div class="main-container container">
            <div class="row">
    
                    
                
                    <h1> <strong>Bienvenido(a) al aprovisionador GPON</strong> </h1>
                    
            </div>
        
        </div>
    </body>
@endsection
