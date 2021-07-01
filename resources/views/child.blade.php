@extends('mains.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    @component('alert')
      @slot('class')
        alert-danger
      @endslot

      @slot('title')
        Mas eri
      @endslot

      Danger Class
    @endcomponent

    @component('alert')
      @slot('class')
        alert-success
      @endslot

      @slot('title')
        Success
      @endslot

      Danger Class
    @endcomponent
@endsection
