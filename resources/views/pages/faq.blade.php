@extends('layouts.web_master') 
@section('title', 'FAQ') 
@push('web-css') 
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endpush 
@section('web-content')
<div class="faq">
    <div class="faq-section">
        <header>
            <h2>FAQs</h2>
            <p>Answers to the most frequently asked questions.</p>
        </header>

        @forelse ($faqs as $item)
        <details>
            <summary>
                <h4>{{ $item->question }}</h4>
                <span class="material-symbols-outlined"><i class="fa-solid fa-chevron-down"></i></span>
            </summary>
            <p>
               {{ $item->answer }}
            </p>
        </details>
            
        @empty
        <details>
            <summary>
                <h4>When is Raycast for teams available?</h4>
                <span class="material-symbols-outlined"><i class="fa-solid fa-chevron-down"></i></span>
            </summary>
            <p>We don't have an exact date right now, but we will launch Raycast for Teams in 2022. You can sign up to get early access above, and be the first to hear when we're launching it.</p>
        </details>

        <details>
            <summary>
                <h4>How many seats do I get in a Team plan?</h4>
                <span class="material-symbols-outlined"><i class="fa-solid fa-chevron-down"></i></span>
            </summary>
            <p>We don't have an exact date right now, but we will launch Raycast for Teams in 2022. You can sign up to get early access above, and be the first to hear when we're launching it.</p>
        </details>

        <details>
            <summary>
                <h4>Can I have personal Extensions and Team Extensions?</h4>
                <span class="material-symbols-outlined"><i class="fa-solid fa-chevron-down"></i></span>
            </summary>
            <p>
                Yes, you can create personal Extensions that are personalized to you, and speed up your productivity, and have team Extensions that can be shared around in your organization for everyone to use. Team Extensions will be
                available in the Store command, behind a filter for your Team. This is where all of your Team Extensions will live, and where you can install them.
            </p>
        </details>
        @endforelse
    </div>
</div>
@endsection
