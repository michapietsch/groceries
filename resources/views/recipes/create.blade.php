@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Recipes</div>

                <div class="card-body">
                    <form action="/recipes" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 block">Save</button>
                    </form>

                </div>
            </div>
    </div>
</div>
@endsection
