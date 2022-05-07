
@include('layouts/header')

    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col h-100">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <div class="card border-0" style="width: 335px">
                        <h3 class="fs-montserrat-md main-text-color mb-4">Register</h3>
                        <form action="{{ route('registerUser') }}" method="post" class="mb-3">
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

                            <div class="mb-3">
                                <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="name">Name</label>
                                <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="text" name="name" id="name" placeholder="Enter your name" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="email">Email</label>
                                <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="email" name="email" id="email" placeholder="Enter your email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fs-montserrat-md mb-1" for="password">Password</label>
                                <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; letter-spacing: 2px; border-radius: 10px;" type="password" name="password" id="password" placeholder="••••••••" required>
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; letter-spacing: 2px; border-radius: 10px;" type="password" name="confirmPassword" id="confirmPassword" placeholder="••••••••" required>
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn fs-montserrat-md text-white main-bg-color w-100" style="font-size: 12.25px; padding: 12px; border-radius: 10px" type="submit">Register</button>
                        </form>
                        <div class="fs-montserrat-md" style="font-size: 12.25px">
                            <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none main-text-color">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col p-0 m-0">
                <div class="w-100 h-100" style="background-image: url('/images/registerBg.png'); background-position: center; background-size: cover; background-repeat: no-repeat"></div>
            </div>
        </div>
    </div>
