@extends('layouts.home')
@section('card_rows')
    <link rel="stylesheet" href="/css/test/card.css">

    {!! \app\Helpers\HTMLSnippet::
        generateCardRow(
            '10%',
            [
                ['href' => 'href1', 'title' => 'Create Internship Application', 'text' => 'text1'],
                ['href' => 'href2', 'title' => 'Internship Journal & Evaluation', 'text' => 'text2']
            ]
        ) !!}

    {!! \app\Helpers\HTMLSnippet::
        generateCardRow(
            '5%',
            [
                ['href' => 'href3', 'title' => 'Qualified Scholarship', 'text' => 'text3'],
                ['href' => 'href4', 'title' => 'Successful Stories', 'text' => 'text4']
            ]
        ) !!}

@endsection






