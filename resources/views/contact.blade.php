@extends('layouts.master')

@section('content')

<div class="container bg-white my-4 p-4 text-center">
    <h1>Contact Us</h1>
    <p>Please use the form below to contact us.</p>

    <form action="/contact" method="post">
        @csrf

        <div class="input-group">
            <label for="subject" class="form-label">Subject:</label>
            <select name="subject" class="form-select" id="subject">
                <option value="Website Suggestion">Website Suggestion</option>
                <option value="Website Error">Website Error</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="input-group">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="message" placeholder="Message" name="message">
                <label for="message">Message</label>
            </div>
        </div>
    </form>
</div>


@endsection