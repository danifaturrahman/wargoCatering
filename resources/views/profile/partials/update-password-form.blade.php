<section>
    <header>
        <p class="fs-24 fw-bold text-gray-900">
            Ubah Password
        </p>

        <p class="m-0 text-muted">
            Gunakan password yang rumit agar aman.
        </p>
    </header>

    @if (session('status_password'))
        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
            {{ session('status_password') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <hr>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label fs-16">Password Sekarang</label>
            <input id="current_password" name="current_password" type="password"
                class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password">
            @error('current_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fs-16">Password Baru</label>
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fs-16">Konfirmasi Password Baru</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</section>
