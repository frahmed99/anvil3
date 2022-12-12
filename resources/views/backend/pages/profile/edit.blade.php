@extends('backend.layouts.default')

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@stop

@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <i class="fa fa-user-circle me-1 text-muted"></i>
            <h3 class="block-title">{{ Auth::user()->name }}, {{ __(' Your Profile') }}</h3>
            <div class="block-options">
            </div>
        </div>
    </div>
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('media/photos/photo34.jpg') }})">
        <div class="bg-black-75 py-4">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-3">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                            src="{{ !empty(Auth::user()->profile_photo_path) ? url('media/upload/user_images/' . Auth::user()->profile_photo_path) : url('media/upload/default_user.jpg') }}"
                            alt="User Avatar">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white fw-bold mb-2">{{ Auth::user()->name }}</h1>
                <!-- END Personal -->
            </div>
        </div>
    </div>
    <!-- User Profile -->
    <div class="block block-rounded">
        <div class="block-content">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your account’s vital info. Please do not share any information.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="mb-4">
                            <label class="form-label" for="name">First Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter your full name.." value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="email">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Enter your email.." value="{{ Auth::user()->email }}">
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-10 col-xl-6">
                                <div class="push">
                                    <img class="img-avatar" id="showImage"
                                        src="{{ !empty(Auth::user()->profile_photo_path) ? url('media/upload/user_images/' . Auth::user()->profile_photo_path) : url('media/upload/default_user.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="profile-settings-avatar" class="form-label">Choose
                                        new avatar</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END User Profile -->
@stop
