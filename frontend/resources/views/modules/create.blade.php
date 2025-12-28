@extends('layouts.dashboardapp')

@section('content')
<div class="container">
    <h3>Add Module</h3>

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf

        <label>Name</label>
        <input class="form-control" name="name">

        <label>Description</label>
        <textarea class="form-control" name="description"></textarea>

        <button class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
