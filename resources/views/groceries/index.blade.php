@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Groceries</div>

                <div class="card-body">
                    <table>
                    @foreach ($groceries as $grocery)
                        <tr>
                            <td><a href="/groceries/{{ $grocery->id}}">{{ $grocery->name }}</a></td>
                        </tr>
                    @endforeach
                    </table>

                    <a href="/groceries/create" class="btn btn-primary mt-4 block">New</a>
                </div>
            </div>
    </div>
</div>
@endsection
