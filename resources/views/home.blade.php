@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($missingInStorage as $storage_id => $needsInThisStorage)
    <div class="card mb-3">
        <div class="card-header">Missing in storage <strong>{{ $needsInThisStorage->first()->storage->name }}</strong></div>

        <div class="card-body">
            <ul>
                @foreach ($needsInThisStorage as $need)
                <li>{{ $need->grocery->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
