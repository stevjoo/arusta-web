@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4 text-center">Event Management</h1>
    <div class="table-responsive">
        <table class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->status }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                        @if($event->status === 'pending')
                        <form action="{{ route('events.approve', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
