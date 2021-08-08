@extends('layouts.base')

@section('title', 'Todoリスト')

@section('body')
<div class="todoList-wrap">
    <ul class="status_list">
        <li>
            <label for="allList"><input id="allList" type="radio" name="status" value="全て" checked />全て</label>
        </li>
        <li>
            <label for="nowList"><input id="nowList" type="radio" name="status" value="作業中" />作業中</label>
        </li>
        <li>
            <label for="complete"><input id="complete" type="radio" name="status" value="完了" />完了</label>
        </li>
    </ul>

    <table class="todoTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>コメント</th>
                <th>完了</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ ($loop->index + 1) }}</td>
                <td>{{ $todo->comment }}</td>
                <td>
                    <form method="post">
                        @csrf
                        @if ($todo->state)
                            <button type="submit" class="stateBtn">完了</button>
                        @else
                            <button type="submit" class="stateBtn">作業中</button>
                        @endif
                    </form>
                </td>
                <td>
                    <form method="post">
                        @csrf
                        <button type="submit" class="delBtn">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="newTask">
        <h2>新規のタスクの追加</h2>
        <div>
            <form method="post">
                @csrf
                <input type="text" name="comment" class="task-input">
                <button type="submit" class="addBtn">追加</button>
            </form>
            @error('comment')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
@endsection
