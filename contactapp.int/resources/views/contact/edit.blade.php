@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(session('msg'))
                    <div class="alert alert-succes" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - Edit contact</div>
                </div>

                <br />

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('contact.edit.update', ['id' => $contact->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$contact->name}}" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$contact->email}}" />
                            </div>

                            <input type="submit" value="Add contact" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection