@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/menu/create') }}" class="btn btn-success btn-sm" title="Add New dish">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @if(Session::has('flash_message'))
                            <div id="message" class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                        @endif
                        @if(Session::has('flash_danger'))
                            <div id="message" class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_danger') !!}</em></div>
                        @endif
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/menu', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/menu/' . $item->id) }}" title="View Menu"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/menu/' . $item->id . '/edit') }}" title="Edit Menu"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/menu', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete user',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $menu->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
