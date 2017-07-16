@extends('layouts.home')
@section('card_rows')
    {!! \app\Helpers\HTMLSnippet::
        generateCardRow(
            '10%',
            [
                ['href' => 'href1', 'title' => 'title1', 'text' => 'text1'],
                ['href' => 'href2', 'title' => 'title2', 'text' => 'text2']
            ]
        ) !!}

@endsection






