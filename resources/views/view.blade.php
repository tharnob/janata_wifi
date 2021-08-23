@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Data') }}</div>









<form action="{{ route('stock.update',$row->id) }}" class="m-4" entype="multipart/form-data" method="post">
    @method('patch')
                    @csrf
                        <div class="form-group">
                            
                            <label for="date">Date:</label>
                            <input type="date" name="date" readonly class="form-control-plaintext" class="form-control" id="date" value="{{$row->date}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="trade_code">Trade Code:</label>
                            <input type="text" name="trade_code" readonly class="form-control-plaintext" class="form-control" id="trade_code" value="{{$row->trade_code}}">
                        </div>
                        <div class="form-group">
                            <label for="high">High:</label>
                            <input type="number" name="high" readonly class="form-control-plaintext" class="form-control" id="high" value="{{$row->high}}">
                    
                        </div>
                        <div class="form-group">
                            <label for="low">Low:</label>
                            <input type="number" name="low" readonly class="form-control-plaintext" class="form-control" id="low" value="{{$row->low}}">
                        </div>
                        <div class="form-group">
                            <label for="open">Open:</label>  
                            <input type="number" name="open" readonly class="form-control-plaintext" class="form-control" id="open" value="{{$row->open}}">
                    
                        </div>
                        <div class="form-group">
                            <label for="close">Close:</label>
                            <input type="number" name="close" readonly class="form-control-plaintext" class="form-control" id="close" value="{{$row->close}}">
                    
                        </div>
                        <div class="form-group">
                            <label for="volume">Volume:</label>
                            <input type="text" name="volume" readonly class="form-control-plaintext" class="form-control" id="volume" value="{{$row->volume}}">
                    
                        </div>

                        

                        
                    </form>    



                    </div>
                    </div>
        </div>
    </div>
</div>
@endsection
