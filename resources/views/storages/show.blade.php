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
                                <label for="quantity_in_stock" class="col-form-label col-form-label-sm">In stock:</label>
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <label for="quantity_required" class="col-form-label col-form-label-sm">Required:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3 col-md-2">
                                    <input type="text" class="form-control form-control-sm" id="quantity_in_stock" name="quantity_in_stock" value="{{ $grocery->pivot->quantity_in_stock }}">
                            </div>
                            <div class="form-group col-sm-3 col-md-2">
                                <input type="text" class="form-control form-control-sm" id="quantity_required" name="quantity_required" value="{{ $grocery->pivot->quantity_required }}">
                            </div>
                            <div class="form-group col-sm-2 col-md-1">
                                <button type="submit" class="btn btn-primary btn-sm block">Save</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">Not yet in this storage:</div>


            <div class="card-body">
                @foreach ($groceriesNotYetInStorage as $grocery)
                    <form action="/storages/{{ $storage->id }}/groceries" method="POST" class="d-flex align-items-center mb-3">
                        @csrf

                        <input type="hidden" name="grocery_id" value="{{ $grocery->id }}">

                        <button type="submit" class="btn btn-primary btn-sm block mr-2">Add</button>
                        <p class="flex-grow-1 mb-0">{{ $grocery->name }}</p>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
