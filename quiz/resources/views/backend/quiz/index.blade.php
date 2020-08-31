@extends('backend.layouts.master')

	@section('title','create quiz')

    @section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Quizzes</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>TIME</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes)>0)
                            @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{$quiz->id}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>{{$quiz->description}}</td>
                                <td>{{$quiz->minutes}}</td>
                                <td><a href="{{route('quiz.question',[$quiz->id])}}"><button class="btn btn-inverse">View Questions</button></a></td>
                                <td><a href="{{route('quiz.edit',[$quiz->id])}}"><button class="btn btn-success">Edit</button></a></td>
                                <td><a href="{{route('quiz.edit',[$quiz->id])}}"><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$quiz->id}}">Delete</button></a></td>
                            </tr>
                            @endforeach
                            @else
                            <td>No quizzes to display</td>
                            @endif

                        </tbody>
                    </table>
                </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$quiz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route('quiz.destroy',[$quiz->id])}}" method="post">@csrf
                                        {{method_field('DELETE')}}
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                        </div>
                    </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection