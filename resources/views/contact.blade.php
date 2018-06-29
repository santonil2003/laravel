@extends('layouts.app')

@section('title', 'Contact')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>
    	<?php

print_r($data);
?>

{{ $name }}
    </p>
@endsection

