
    @extends('layouts.app')

    @section('title', 'Список задач')

    @section('content')
        <div class="text-center mt-5">
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

        <a href="{{ route('task.create') }}">
            <div class="col-md-1 mx-auto my-1">

               <h2 class="text-center p-4 text-uppercase border border-blue rounded-pill bg-primary text-light"><i class="bi bi-ui-radios"></i> To-Do</h2>
            </div>
        </a>
        <div class="text-center">   
            <div class="row justify-content-center">
                <div class="col-lg-5">
                <table class="table table-striped table-primary  table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    @php $counter=1 @endphp

                    @foreach($todos as $todo)
                        <tr>
                            <th>{{$counter}}</th>
                            <td><strong>{{$todo->title}}</strong></td>
                            <td>{{$todo->description}}</td>
                            <td>{{$todo->created_at}}</td>
                            <td>
                                @if($todo->is_completed)
                                    <div class="badge bg-success">Выполнена</div>
                                @else
                                    <div class="badge bg-warning">Не выполнена</div>
                                @endif
                            </td>
                            <td>
                            <a href="{{route('todos.edit',['todo'=>$todo->id])}}" class="btn btn-info" title="Редактировать"><i class="bi bi-pencil-square"></i></a> 
                            <a href="{{route('todos.destory',['todo'=>$todo->id])}}" class="btn btn-danger" title="Удалить"><i  class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                        

                        @php $counter++; @endphp

                    @endforeach
                    </tbody>
                </table>
                <!-- <div class="text-center mt-5">
                        <a href="{{ route('task.create') }}" class="btn btn-primary">Создать задачу</a>
                        </div> -->
                </div>
            </div>
        </div>
     </div>
      
    @endsection

