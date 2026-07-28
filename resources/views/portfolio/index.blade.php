@extends('layouts.portfolio')

@section('content')
    <x-navbar />

    <main>
        <x-hero :hero-content="$heroContent" />
        <x-about :about-content="$aboutContent" />
        <x-skills :skills="$skills" />
        <x-experience :experiences="$experiences" />
        <x-projects :projects="$projects" />
        <x-services :services="$services" />
        <x-testimonials :testimonials="$testimonials" />
        <x-contact :contact-info="$contactInfo" />
    </main>

    <x-footer :contact-info="$contactInfo" />
@endsection
