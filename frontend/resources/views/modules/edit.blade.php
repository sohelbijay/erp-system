@extends('layouts.dashboardapp')

@section('content')
<div class="container">
    <h3>Edit Module</h3>

    <form action="{{ route('modules.update', $module['id']) }}" method="POST">
        @csrf

        <label>Name</label>
        <input class="form-control" name="name" value="{{ $module['name'] }}">

        <label>Description</label>
        <textarea class="form-control" name="description">{{ $module['description'] }}</textarea>

        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
