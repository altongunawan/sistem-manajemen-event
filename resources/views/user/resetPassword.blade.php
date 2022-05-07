@include('layouts/header')


<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col h-100">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="card border-0" style="width: 335px">

                    <form action="{{ route('user.reset.password') }}" method="post" class="mb-3">
                        @csrf
                        {{-- Response Feedback --}}
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                        {{-- End Response Feedback --}}

                            <h3 style="font-size: 18px" class="fw-bold">Reset Your Password</h3>
                            <p style="font-size: 12px" class="fw-light">Input your new password to reset your account password</p>

                            <input type="hidden" name="token" id="token" value="{{ $token }}">
                            <div class="mb-3">
                                <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="email">Email</label>
                                <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="email" name="email" id="email" placeholder="Enter your email" value="{{ $email ?? old('email') }}" disabled>
                                @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                            <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="password">New password</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="password" name="password" id="password" placeholder="Enter your password">
                            @error('password')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="password_confirmation">Confirm New Password</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                            @error('password_confirmation')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn fs-montserrat-md text-white main-bg-color w-100" style="font-size: 12.25px; padding: 12px; border-radius: 10px" type="submit">Submit</button>
                    </form>

                    <div class="fs-montserrat-md" style="font-size: 12.25px">
                        <p class="text-center">Back to <a href="{{ route('login') }}" class="text-decoration-none main-text-color">Login</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
