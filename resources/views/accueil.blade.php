@extends('layouts.app')

@section('title', 'La toile - Accueil')

@section('content')
    <h1>La toile</h1>

    <p id="description_exposition">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet diam eu leo blandit congue. Ut ut nulla vitae mi gravida scelerisque. Fusce eget orci aliquet, luctus dolor euismod, ultrices justo. Nullam bibendum hendrerit augue, non hendrerit justo pellentesque quis. Nunc non sem varius, ultricies augue sit amet, bibendum ligula.
    </p>

    <a href="{{route('salles.index')}}">Liste de salles</a>

    <a href="#">INTERVIEW</a>
@endsection
