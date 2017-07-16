{{--this is admin home page--}}

{{--<a href="application/approve">To approve internship applications</a>--}}
{{--<a href="application/approve">To review internship evaluations</a>--}}


@extends('layouts.home')
@section('card_rows')
    {!! \app\Helpers\HTMLSnippet::
        generateCardRow(
            '10%',
            [
                ['href' => 'href1', 'title' => 'Approve Applications', 'text' => 'text1'],
                ['href' => 'href2', 'title' => 'AAAAA', 'text' => 'text2']
            ]
        ) !!}

    {!! \app\Helpers\HTMLSnippet::
        generateCardRow(
            '5%',
            [
                ['href' => 'href3', 'title' => 'BBBBBB', 'text' => 'text3'],
                ['href' => 'href4', 'title' => 'CCCCCC', 'text' => 'text4']
            ]
        ) !!}

@endsection






