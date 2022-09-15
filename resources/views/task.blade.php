<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}" />--}}

    <title>Kanban Board</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">



    @include('css.style')
    @include('js.script')
</head>
    <body>
        <div class="row">

            <div class="col-md-12 col-lg-12">

                <div class="container m-l-3 m-r-3">

                    <!-- form div starts -->
                    <div class="col-md-12 col-lg-12 my-4">

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3  d-flex justify-content-center my-1">

                                    <form id="task-store" action="{{route('task.store')}}" method="post">
                                        @csrf
                                        <input type="text" name="task" placeholder="Write your task..." required>
                                        <button type="submit" class="btn-md m-l-3 submit bg-white">Add</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- form div ends -->

                    <!-- Three Board starts -->
                    <div class="row my-3">

                       <!-- To do list starts -->
                        <div class="col-md-4 col-lg-4">
                            <div class="card text-center">
                                <div class="card-header"> <b> To Do</b></div>
                                <div class="card-body" id="to-do-list">
                                    @foreach($todoList as $list)
                                        <h5 class="task" id="{{$list->id}}" draggable="true"
                                            ondragstart="dragFromToDo(event)">{{$list->task}}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- To do list ends -->

                        <!-- In Progress List starts -->
                        <div class="col-md-4 col-lg-4">
                            <div class="card text-center">
                                <div class="card-header"><b>In Progress</b></div>
                                <div class="card-body" id="in-progress-list"
                                     ondrop="dropFromToDo(event)"
                                     ondragover="allowDrop(event)">

                                    @foreach($progressList as $list)
                                        <h5 class="task" id="{{$list->id}}" draggable="true"
                                            ondragstart="dragFromInProgress(event)">{{$list->task}}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- In Progress List ends -->


                        <!-- Done List -->
                        <div class="col-md-4 col-lg-4">
                            <div class="card text-center">
                                <div class="card-header"><b>Done</b></div>
                                <div class="card-body" id="done-list"
                                     ondrop="dropFromInProcess(event)"
                                     ondragover="allowDrop(event)">

                                    @foreach($doneList as $list)
                                        <h5 class="task" id="{{$list->id}}">{{$list->task}}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Three boards ends -->
                </div>
            </div>
        </div>
    </body>
</html>