@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
<div class="text-center mt-5">
        <h2>Добавление задачи:</h2>
</div>

        <form class="row g-3 justify-content-center" method="POST" action="{{ route('todos.store') }}">
            @csrf
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input type="text" class="form-control" name="title" placeholder="Заголовок">
                    </div> 
                    <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea class="form-control" name="description" placeholder="Описание"></textarea>
                    </div> 
                    <div class="mb-3">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
                </div>
        </form>
    </div>

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
    @endsection