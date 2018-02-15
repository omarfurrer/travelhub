@extends('layouts.admin')

@section('content')
<div class="container" id="admin-agencies">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ $agencies->count() }}</b> Agencies
                    <a href="/admin/agencies/create" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>

                <div class="panel-body">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>D.O.E.</th>
                                <th>Links</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agencies as $agency)
                            <tr>
                                <td width="100px"><img width="100" height="100" src="{{ asset('storage/'.$agency->logo_path) }}"></td>
                                <td width="200px">{{ $agency->name }}</td>
                                <td width="100px">{{ $agency->description }}</td>
                                <td width="100px">{{ $agency->address }}</td>
                                <td>{{ $agency->contact_phone }}</td>
                                <td>{{ $agency->doe != NULL ? $agency->doe->toFormattedDateString() : '-' }}</td>
                                <td class="links">
                                    <a target="_blank" href="{{ $agency->website_url }}"><i class="fa fa-external-link"></i></a>
                                    <a target="_blank" href="{{ $agency->fb_url }}"><i class="fa fa-facebook-official"></i></a>
                                    <a target="_blank" href="{{ $agency->gmaps_url }}"><i class="fa fa-map-marker"></i></a>
                                </td>
                                <td>
                                    <a href="/admin/agencies/{{ $agency->id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="return deleteModel(event,'delete-form-{{$agency->id}}', 'Are you sure you want to delete this agency ? All related data will be lost');">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <form id="delete-form-{{$agency->id}}" action="/admin/agencies/{{ $agency->id }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
