@extends('layouts.main')
@section('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css')
@section('dir', 'ltr')
@section('title')
    تماس با حاجی
@endsection
@section('content')
    {{-- <x-alert type="success" message="salam"/> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="/send-message" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input name="phone" type="tel" class="form-control" id="phone" placeholder="+989112746075">
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full name</label>
                        <input name="fullName" type="text" class="form-control" id="fullName" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Enter your message</label>
                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
