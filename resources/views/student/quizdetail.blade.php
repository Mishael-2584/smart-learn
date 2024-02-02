@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $quiz->title }}</h1>
        </div>

        <div class="section-body">
            @foreach(['mcq', 'short', 'truefalse'] as $type)
                @foreach($data[$type] as $question)
                    <div>
                        <h3>{{ $question['text'] }}</h3>
                        @if ($type === 'mcq')
                            <ul>
                                @foreach($question['choices'] as $choice)
                                    <li>{{ $choice['option'] }} - {{ $choice['written_response'] }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <p>Correct Answer: {{ $question['answer'] }}</p>
                        <p>Your Answer: {{ $question['student_response'] }}</p>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>
</div>
@endsection