@extends('layouts.main')

@section('content')
<div id="search-costs">
    <div class="container">
            <br>
            <h2 style="text-align: center;" >Create a type costs</h2>
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row" >
                <form method="POST" action="{{route('create-type')}}" >
                    @csrf
                    <div class="col-xs-6 col-xs-offset-3 account-left">
                        <input type="text" name="name" placeholder="Name">
                        <div class="address">
                            <input type="submit" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection