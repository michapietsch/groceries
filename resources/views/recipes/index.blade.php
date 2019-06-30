@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Recipes</div>

                <div class="card-body">
                    <table>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td><a href="/recipes/{{ $recipe->id}}">{{ $recipe->name }}</a></td>
                        </tr>
                    @endforeach
                    </table>

                    <a href="/recipes/create" class="btn btn-primary mt-4 block">New</a>
                </div>
            </div>
    </div>
</div>
@endsection
