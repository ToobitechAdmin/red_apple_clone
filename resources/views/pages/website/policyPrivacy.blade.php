@extends('pages.website.layout.master')
@section('title', 'Home')
@section('style')
@endsection
@section('content')

    <div class="container-fluid rpt">
        {!! $data->paragraph !!}


    </div>



@endsection
@section('script')
@endsection
