@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2><center>Your Result</center></h2>
            @foreach($results as $key => $result)
            <div class="card">
                <div class="card-header">{{$key+1}}</div>

                <div class="card-body">
                    <p>
                        <h2>
                            {{$result->question->question}}
                        </h2>
                    </p>
                    @php
                    $i = 1;
                    $answers = DB::table('answers')->where('question_id', $result->question_id)->get();
                    foreach ($answers as $ans) {
                        echo'<p>'.$i++.') ' .$ans->answer.
                            '</p>';
                    }
                        
                    @endphp
                    <p>
                        <mark>
                            Your answer:{{$result->answer->answer}}
                        </mark>
                    </p>

                    @php
                        $correctAnswers = DB::table('answers')->where('question_id', $result->quedtion_id)->where('is_correct', 1)->get();
                        foreach ($correctAnswer as $ans) {
                            echo "Correct Answer:".$ans->answer;
                        }
                    @endphp
                    @if($result->answer->is_correct)
                        <p>
                            <span class="badge badge-success">Correct</span>
                        </p>
                        @else 
                        <p>
                            <span class="badge badge-danger">Incorrect</span>
                        </p>
                    @endif

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection