@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(count($contacts))
    
        <div class = "panel panel-default">
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
                    <td>&nbsp;</td>
                </tr>
                @endforeach
            </table>
        </div>
        @else
        <br/>
<div class="alert alert-warning" role="alert">
    <p>No contacts found!</p>
</div>

    @endif
  </div>
</div>
@endsection
