@include('layouts/header')

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col h-100">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="card border-0" style="width: 335px">
                    <h3 class="fs-montserrat-md main-text-color mb-4">Register</h3>
                    <form action="" class="mb-3">
                        <div class="mb-3">
                            <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="register-input-name">Name</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="text" name="register-input-name" id="register-input-name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="">Email</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; border-radius: 10px" type="email" name="register-input-email" id="register-input-email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="fs-montserrat-md mb-1" for="">Password</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; letter-spacing: 2px; border-radius: 10px;" type="password" name="register-input-password" id="register-input-password" placeholder="••••••••">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 14px" class="fs-montserrat-md mb-1" for="">Confirm Password</label>
                            <input class="form-control fs-montserrat-li px-4" style="padding: 12px; font-size: 14px; letter-spacing: 2px; border-radius: 10px;" type="password" name="register-input-password" id="register-input-password" placeholder="••••••••">
                        </div>
                        <button class="btn fs-montserrat-md text-white main-bg-color w-100" style="font-size: 12.25px; padding: 12px; border-radius: 10px">Register</button>
                    </form>
                    <div class="fs-montserrat-md" style="font-size: 12.25px">
                        <p class="text-center">Already have an account? <a href="/login" class="text-decoration-none main-text-color">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0 m-0">
            <div class="w-100 h-100" style="background-image: url('/images/registerBg.png'); background-position: center; background-size: cover; background-repeat: no-repeat"></div>
        </div>
    </div>
</div>