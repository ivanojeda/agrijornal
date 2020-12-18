@extends('home')

@section('content')
<?php $u = App\User::find( auth()->user()->id );
$us =  $u->roles()->first()->name;?>
@if($us == 'agricultor')
    @include('jornadas.agricultor')
@elseif($us == 'jornalero')
    @include('jornadas.jornalero')
@else
<?php header("Location: /");
die(); ?>
@endif   
@endsection 
