@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    @if(Auth::check())
        @if(count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show',  $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        
        {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
    @else
        {!! link_to_route('signup.get', 'Signup', [], ['class' => 'btn btn-secondary']) !!}
    @endif
@endsection