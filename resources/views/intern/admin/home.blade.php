{{--this is admin home page--}}

{{--<a href="application/approve">To approve internship applications</a>--}}
{{--<a href="application/approve">To review internship evaluations</a>--}}

{{--TODO--}}
{{--need to improve float cards' height--}}

@extends('layouts.home')
@section('card_rows')
    <link rel="stylesheet" href="/css/test/rotating-card.css">

    {!! \app\Helpers\HTMLSnippet::
        generateRotatingCardRow(
            '10%',
            [
                [
                    'front_title' => 'Internship Applications',
                    'front_text' => 'some text',
                    'back_title_1' => 'Approve Internship',
                    'back_title_2' => 'Close Internship',
                    'back_url_1' => './admin/application/to_approve', 'back_url_2' => '#'
                ],
                [
                    'front_title' => 'Scholarships',
                    'front_text' => 'some text 2',
                    'back_title_1' => 'Scholarship entry 1',
                    'back_title_2' => '',
                    'back_url_1' => '',
                    'back_url_2' => ''
                ],
            ]
        ) !!}

    {!! \app\Helpers\HTMLSnippet::
        generateRotatingCardRow(
            '5%',
            [
                [
                    'front_title' => '',
                    'front_text' => '',
                    'back_title_1' => '',
                    'back_title_2' => '',
                    'back_url_1' => '',
                    'back_url_2' => ''
                ],
            ]
        ) !!}

@endsection






