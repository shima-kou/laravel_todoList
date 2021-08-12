@extends('layouts.base')

@section('title', 'Todoリスト')

@section('body')
<div class="todoList-wrap">
    <form method="get" name="statusChange">
        <ul class="status_list" >
            <li>
                <label for="all">
                    <input
                        id="all"
                        type="radio"
                        name="status"
                        value="all"
                        onclick="statusLink();"
                        {{ $status == 'all' ? 'checked' : '' }}
                    />
                    全て
                </label>
            </li>
            <li>
                <label for="works">
                    <input id="works"
                        type="radio"
                        name="status"
                        value="works"
                        onclick="statusLink();"
                        {{ $status == 'works' ? 'checked' : '' }}
                    />
                    作業中
                </label>
            </li>
            <li>
                <label for="complete">
                    <input
                        id="complete"
                        type="radio"
                        name="status"
                        value="complete"
                        onclick="statusLink();"
                        {{ $status == 'complete' ? 'checked' : '' }}
                    />
                    完了
                </label>
            </li>
        </ul>
    </form>
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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $todo->comment }}</td>
                <td>
                    <form action="/{{$todo->id}}" method="post">
                        @csrf
                        @method('patch')
                        @if ($todo->state)
                            <button type="submit" class="stateBtn">完了</button>
                        @else
                            <button type="submit" class="stateBtn">作業中</button>
                        @endif
                    </form>
                </td>
                <td>
                    <form action="/{{$todo->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="status" value="{{ $status }}">
                        <button type="submit" class="delBtn" >削除</button>
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
                <input type="hidden" name="status" value="{{ $status }}">
                <input type="text" name="comment" class="task-input">
                <button type="submit" class="addBtn">追加</button>
            </form>
            @error('comment')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
@section('scripts')
    <script>
        const statusLink = () => {
            document.statusChange.submit();
        }
    </script>
@endsection
@endsection
