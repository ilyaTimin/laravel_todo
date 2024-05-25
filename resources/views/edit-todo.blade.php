

@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="text-center mt-5">
        <h2>Редактирование задачи:</h2>
    </div>
    <form method="POST" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
        @csrf
        {{ method_field('PUT') }}

        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $todo->title }}">
                    
                <div class="mb-3" id="floatingTextarea">
                <label class="form-label" id="floatingTextarea">Описание</label>
                <textarea class="form-control" name="description" placeholder="Описание" id="floatingTextarea" value="{{ $todo->description }}"></textarea>
            </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Статус</label>
                    <select name="is_completed" id="" class="form-control">
                        <option value="1" @if($todo->is_completed == 1) selected @endif>Выполнена</option>
                        <option value="0" @if($todo->is_completed == 0) selected @endif>Не выполнена</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection