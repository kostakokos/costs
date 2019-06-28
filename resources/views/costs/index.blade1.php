@extends('layouts.main')

@section('content')
    <div id="search-costs">
        <div class="container">
            <div class="row" >
                <form method="GET" >
                    <div class="col-xs-6 account-left">
                        <input type="text" name="id" placeholder="ID">
                        <input type="text" name="amount" placeholder="Amount">
                        <input type="text" name="date" placeholder="Date">
                    </div>
                    <div class="col-xs-6 account-left">
                        <select name="count" >
                            <option >Number of lines per page</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                        <select name="type" >
                            <option >Select type of expenses</option>
                            <option value="">Телевизоры</option>
                            <option value="">Телевизоры</option>
                            <option value="">Телевизоры</option>
                            <option value="">Телевизоры</option>
                        </select>
                        <div class="address">
                            <input type="submit" value="Filter">
                        </div>
                    </div>
                </form>
            </div>
            </br>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 80px;" >
                                    <a href="#">ID</a>
                                </th>
                                <th ><a href="#">Type</a></th>
                                <th style="width: 80px;" ><a href="#">Amount</a></th>
                                <th >Description</th>
                                <th style="width: 160px;" >Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                                <tr>
                                    <td>{{ $cost->id }}</td>
                                    <td>{{ $cost->typeCosts->name }}</td>
                                    <td>{{ $cost->amount }} $</td>
                                    <td>{{ $cost->description }}</td>
                                    <td>{{ $cost->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if($costs->total() > $costs->count() )
                {{ $costs->links() }}
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app.js"></script>
@endsection