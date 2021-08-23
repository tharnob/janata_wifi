@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Stock Market Data') }}</div>


                <div class="card-body">

               

                <a href="{{ route('stock.index') }}" class="btn btn-lg btn-success float-right">Stock</a>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
