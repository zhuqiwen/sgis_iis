

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
                    'back_url_1' => './admin/application/to_approve', 'back_url_2' => './admin/internship/to_close'
                ],
                [
                    'front_title' => 'Scholarships',
                    'front_text' => 'some text 2',
                    'back_title_1' => 'Entry 1',
                    'back_title_2' => 'Entry 2',
                    'back_url_1' => '#',
                    'back_url_2' => '#'
                ],
            ]
        ) !!}

    {!! \app\Helpers\HTMLSnippet::
        generateRotatingCardRow(
            '5%',
            [
                [
                    'front_title' => 'Statistics',
                    'front_text' => 'some text',
                    'back_title_1' => 'Reports',
                    'back_title_2' => 'Visualizations',
                    'back_url_1' => '#',
                    'back_url_2' => '#'
                ],
                [
                    'front_title' => 'Past Internships',
                    'front_text' => 'some text',
                    'back_title_1' => '',
                    'back_title_2' => '',
                    'back_url_1' => '#',
                    'back_url_2' => '#'
                ],
            ]
        ) !!}

@endsection






