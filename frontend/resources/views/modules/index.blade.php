@extends('layouts.dashboardapp')

@section('content')
<div class="container">

    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Add Module</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th width="150">Actions</th>
        </tr>

        @foreach($modules as $m)
        <tr>
            <td>{{ $m['id'] }}</td>
            <td>{{ $m['name'] }}</td>
            <td>{{ $m['description'] }}</td>
            <td>
                <a href="{{ route('modules.edit', $m['id']) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('modules.delete', $m['id']) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Del</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection
