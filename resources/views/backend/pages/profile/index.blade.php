@extends('backend.layouts.default')

@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Profile') }}</a>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">{{ __('Your Profile') }}</h3>
            <div class="block-options">
                <a href="#" type="button" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Edit Profile') }}
                </a>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user-circle me-1 text-muted"></i> User Profile
            </h3>
        </div>
        <div class="block-content">
            <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="mb-4">
                            <label class="form-label" for="profile-settings-name">Name</label>
                            <input type="text" class="form-control form-control" id="profile-settings-name"
                                name="profile-settings-name" placeholder="Enter your name.." value="John Doe">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="profile-settings-email">Email Address</label>
                            <input type="email" class="form-control form-control" id="profile-settings-email"
                                name="profile-settings-email" placeholder="Enter your email.." value="john.doe@example.com">
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-10 col-xl-6">
                                <div class="push">
                                    <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="profile-settings-avatar">Choose new avatar</label>
                                    <input class="form-control" type="file" id="profile-settings-avatar"
                                        name="profile-settings-avatar">
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
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-asterisk me-1 text-muted"></i> Change Password
            </h3>
        </div>
        <div class="block-content">
            <form action="be_pages_generic_profile.edit.html" method="POST" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="mb-4">
                            <label class="form-label" for="profile-settings-password">Current Password</label>
                            <input type="password" class="form-control form-control" id="profile-settings-password"
                                name="profile-settings-password">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="profile-settings-password-new">New Password</label>
                            <input type="password" class="form-control form-control" id="profile-settings-password-new"
                                name="profile-settings-password-new">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="profile-settings-password-new-confirm">Confirm New
                                Password</label>
                            <input type="password" class="form-control form-control"
                                id="profile-settings-password-new-confirm" name="profile-settings-password-new-confirm">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
