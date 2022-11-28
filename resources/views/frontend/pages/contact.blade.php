@extends('frontend.layouts.default')
@section('content')

<!-- Hero -->
<div class="bg-primary">
    <div class="bg-black-25">
        <div class="content content-top text-center">
            <div class="py-5">
                <h1 class="fw-bold text-white mb-2">Get In Touch</h1>
                <h2 class="h4 fw-normal text-white-75">Do you have any questions?</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Contact Form -->
<!-- Contact Form Validation functionality is initialized in js/pages/be_pages_generic_contact.min.js which was auto compiled from _js/pages/be_pages_generic_contact.js -->
<!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
<div class="content content-full">
    <div class="row justify-content-center py-4">
        <div class="col-lg-8 col-xl-6">
            <form class="js-validation-be-contact" action="be_pages_generic_contact.html" method="POST">
                <div class="mb-4">
                    <label class="form-label" for="be-contact-name">Name</label>
                    <input type="text" class="form-control form-control-lg" id="be-contact-name"
                        name="be-contact-name" placeholder="Enter your name..">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="be-contact-email">Email</label>
                    <input type="email" class="form-control form-control-lg" id="be-contact-email"
                        name="be-contact-email" placeholder="Enter your email..">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="be-contact-subject">Where?</label>
                    <select class="form-select form-control-lg" id="be-contact-subject"
                        name="be-contact-subject">
                        <option value="1">Support</option>
                        <option value="2">Billing</option>
                        <option value="3">Management</option>
                        <option value="4">Feature Request</option>
                        <option value="5">Hiring Team</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="be-contact-message">Message</label>
                    <textarea class="form-control form-control-lg" id="be-contact-message" name="be-contact-message" rows="10"
                        placeholder="Enter your message.."></textarea>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-paper-plane opacity-50 me-1"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Contact Form -->
@stop
