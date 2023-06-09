@extends('layout.body2')
@section('title', 'Sign Up')
@section('content')

<section id="sign-in" class="sign-in">
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-0">
                    <h5 class="text-left small pb-0 fs-6" style="margin-bottom: -35px;">Welcome! 👋</h5>
                </div>
                <div class="pt-4 pb-2">
                    {{-- <p class="text-center small">Welcome Back 👋</p> --}}
                    <h5 class="card-title text-left pb-3 fs-4">Sign up to create account</h5>
                </div>
                <form class="row g-3 needs-validation" novalidate>
                  <div class="col-12">
                    <h5 for="yourName" class="form-label pb-0 fs-6">Your Name</h5>
                    <div class="input-group has-validation">
                      {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                      <input type="text" name="yourName" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <h5 for="yourEmail" class="form-label pb-0 fs-6">Your Email</h5>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="yourEmail" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <h5 for="phoneNumber" class="form-label pb-0 fs-6">Phone Number</h5>
                    <div class="input-group has-validation">
                      {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                      <input type="number" name="phoneNumber" class="form-control" id="phoneNumber" required>
                      <div class="invalid-feedback">Please enter your phone number.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="yourPassword" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  {{-- <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div> --}}
                  <div class="col-12">
                    <button class="btn btn-primary w-100" style="font-family: Nunito;" type="submit">CONTINUE</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0" style="text-align: center">Already have an account?<a href="pages-register.html"> Sign in</a></p>
                  </div>
                </form>

              </div>
            </div>

            {{-- <div class="button-signup">
              Don't have an account ? <a href="https://bootstrapmade.com/">Sign Up</a>
            </div> --}}

          </div>
        </div>
      </div>
    </section>
  </div>
</section>
@endsection