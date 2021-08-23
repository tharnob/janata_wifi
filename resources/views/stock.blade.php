@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Stock Market Data') }}</div>


                <div class="card-body">

                <!-- Large modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Add Data</button>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
@if(Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
    </div>
@endif
@if(Session::has('delete'))
    <div class="alert alert-danger">
        {{ Session::get('delete') }}
    </div>
@endif



                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <form action="{{ route('stock.store') }}" class="m-4" entype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date">
                    
                        </div>
                        <div class="form-group">
                            <label for="trade_code">Trade Code</label>
                            <input type="text" name="trade_code" class="form-control" id="trade_code" placeholder="Enter Trade Code">
                        </div>
                        <div class="form-group">
                            <label for="high">High</label>
                            <input type="number" name="high" class="form-control" id="high" placeholder="High">
                    
                        </div>
                        <div class="form-group">
                            <label for="low">Low</label>
                            <input type="number" name="low" class="form-control" id="low" placeholder="Low">
                        </div>
                        <div class="form-group">
                            <label for="open">Open</label>
                            <input type="number" name="open" class="form-control" id="open" placeholder="Open">
                    
                        </div>
                        <div class="form-group">
                            <label for="close">Close</label>
                            <input type="number" name="close" class="form-control" id="close" placeholder="Close">
                    
                        </div>
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="number" name="volume" class="form-control" id="volume" placeholder="Volume">
                    
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>    
                  
                    </div>
                </div>
                </div>                
                    
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Trade Code</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>Volume</th>
                        </thead>
                        <tbody>
                        
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->trade_code }}</td>
                                    <td>{{ $row->high }}</td>
                                    <td>{{ $row->low }}</td>
                                    <td>{{ $row->open }}</td>
                                    <td>{{ $row->close }}</td>
                                    <td>{{ $row->volume }}</td>
                                    <td>
                                        <a href="{{ route('stock.show', $row->id) }}" class="btn btn-success">View</a>
                                        <a href="{{ route('stock.edit', $row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('stock.destroy',$row->id) }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            {{$data->links() }}
                        </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
