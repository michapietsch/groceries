@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Storages</div>

                <div class="card-body">
                    <table>
                    @foreach ($storages as $storage)
                        <tr>
                            <td><a href="/storages/{{ $storage->id}}">{{ $storage->name }}</a></td>
                        </tr>
                    @endforeach
                    </table>

                    {{-- <a href="/storages/create" class="btn btn-primary mt-4 block">New</a> --}}
                </div>
            </div>
    </div>
</div>
@endsection
