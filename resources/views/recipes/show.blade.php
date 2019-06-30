@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">{{ $recipe->name }}</div>

            <div class="card-body">
                @foreach ($recipe->groceries as $grocery)
                    <p>{{ $grocery->name }}</p>
                @endforeach
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">Not used for this recipe:</div>

            <div class="card-body">
                @foreach ($groceriesNotYetInRecipe as $grocery)
                    <form action="/recipes/{{ $recipe->id }}/groceries" method="POST" class="d-flex align-items-center mb-3">
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
