<x-guest-layout>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Perpustakaan Terbaik <br />
            <span class="text-primary">Dan Terlengkap</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Ini adalah perpustakaan terbaik dan terlengkap di seluruh indonesia, kalau ada buku yang tidak ada silahkan hubungi admin untuk penambahan bukunya. Terimakasih sudah menggunakan perpustakaan online ini.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
    <form method="POST" action="{{ route('register') }}">
        @csrf
                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password 2 input -->
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-2">
                  {{ __('Register') }}
                </button>
                <h1 class="fw-bold text-center"><span>Jika sudah punya akun silahkan langsung login.</span>
          </h1>
                <!-- Register buttons -->
                  <a href="{{ route('login') }}"  class="btn btn-primary btn-block mb-2 mt-2">
                  Login
                </a>
                <h1 class="fw-bold text-center"><span>Atau kembali ke halaman utama</span>
          </h1>
                <!-- back buttons -->
                  <a href=".."  class="btn btn-primary btn-block mb-4 mt-2">
                  Home
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</x-guest-layout>