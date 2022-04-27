@extends('layouts.login')

@section('content')

<img src="{{ asset('storage/profiles/'.$user->images) }}" alt="プロフィール画像">

@endsection