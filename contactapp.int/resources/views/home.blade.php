@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - <a href="{{ route('contact.add') }}">Create new contact</a></div>
                </div>
                
                <br/>

            @if(count($contacts))

                <div class="panel panel-default">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name}}</td>
                                <td>{{ $contact->email}}</td>
                                <td><a href="{{ route('contact.edit', ['id' => $contact->id]) }}">edit</a> / <a href="{{ route('contact.delete', ['id' => $contact->id]) }}"></a>delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <br />
                <div class="alert alert-warning" role="alert">
                    <p>No contacts found!</p>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection