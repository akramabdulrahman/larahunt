@extends('layouts.email')

@section('content')
    <p>Thank you for creating an account on <a href="{{ route('home') }}">Larahunt</a>; we're excited to have you on board!</p>
    <p>If you have any questions at all, feel free to reach out to us by emailing <a href="mailto:hello@larahunt.io?subject=Larahunt Support">hello@larahunt.io</a>, or by creating an <a href="https://github.com/larahunt/larahunt/issues/new">issue</a> on GitHub.</p>
@stop
