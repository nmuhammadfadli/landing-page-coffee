@extends('layouts.app')

@section('content')
    <x-hero />
    <x-brand-story />
    <x-featured-coffee :products="$products" show-view-all="true" />
    <x-why-choose-us />
    <x-coffee-journey :timeline-steps="$timelineSteps" />
    <x-testimonials :testimonials="$testimonials" />
    <x-articles-section :articles="$articles" />
    <x-final-cta />
@endsection
