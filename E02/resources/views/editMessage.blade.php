@extends('layouts.main')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="/edit-message/{{ $message->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" readonly value="{{ $message->email }}" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input name="mobile" readonly value="{{ $message->mobile }}" type="tel" class="form-control" id="phone" placeholder="+989112746075">
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full name</label>
                        <input name="fullName" readonly value="{{ $message->fullName }}" type="text" class="form-control" id="fullName" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Enter your message</label>
                        <textarea name="message" class="form-control" id="message" rows="3">{{ $message->message }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="SAVE CHANGES" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
