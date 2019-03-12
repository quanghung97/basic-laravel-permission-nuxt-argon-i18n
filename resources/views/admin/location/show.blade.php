@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Location {{ $location->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/location') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/location/' . $location->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/location', $location->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $location->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $location->name }} </td></tr><tr><th> Address </th><td> {{ $location->address }} </td></tr><tr><th> Min people </th><td> {{ $location->min_people }} </td></tr>
                                    <tr><th> Max people </th><td>{{ $location->max_people }}</td></tr>
                                    <tr><th> Status </th><td>{{ $status->name }}</td></tr>
                                    <tr><th> Image </th><td><img src="{{ '/'.$location->link_image }}"/></td></tr>
                                    <tr><th> Type Services </th><td>{{ implode(', ',$typeServices) }}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
