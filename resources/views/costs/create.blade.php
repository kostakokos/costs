@extends('layouts.main')

@section('content')
<div id="search-costs">
    <div class="container">
            <br>
            <h2 style="text-align: center;" >Create a new expense entry</h2>
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
                @if(!$types->isEmpty())
                <form method="POST" action="{{route('create')}}" >
                    @csrf
                    <div class="col-xs-6 col-xs-offset-3 account-left">
                        <select name="type" >
                            <option>Select type</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        <input type="number" min='0' name="amount" placeholder="Amount">
                        <label >Description</label>         
                        <textarea name="description" style="width:100%;border-color: #ddd;" 
                            rows="4"></textarea>
                        <div class="address">
                            <input type="submit" value="Create">
                        </div>
                    </div>
                </form>
                @else
                    <h3 style="text-align: center;color:tomato;" >Create a cost type first</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection 

