@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">{{ $storage->name }}</div>

                <div class="card-body">
                    @foreach ($storage->groceries as $grocery)
                            <h4>{{ $grocery->name }}</h4>
                            <form action="/storages/{{ $storage->id }}/groceries/{{ $grocery->pivot->grocery_id }}" method="POST">
                                @csrf
                                @method('PATCH')

                                    <div class="row">
                                    <div class="col-sm-3 col-md-2">
                                        <label for="quantity_in_stock">In stock:</label>
                                    </div>
                                    <div class="col-sm-3 col-md-2">
                                        <label for="quantity_required">Required:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-3 col-md-2">
                                            <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ $grocery->pivot->quantity_in_stock }}">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-2">
                                        <input type="text" class="form-control" id="quantity_required" name="quantity_required" value="{{ $grocery->pivot->quantity_required }}">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-2">
                                        <button type="submit" class="btn btn-primary block">Save</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                    @endforeach

                    {{-- <a href="/storages/create" class="btn btn-primary mt-4 block">New</a> --}}
                </div>
            </div>
    </div>
</div>
@endsection
