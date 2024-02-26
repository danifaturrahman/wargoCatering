<section class="col-md-12" style="min-height: 30vh">
    <header>
        <p class="fs-24 fw-bold text-gray-900">
            Profil
        </p>
        <p class="m-0 text-muted">
            Ubah nama anda disini.
        </p>
    </header>

    @if (session('status_profil'))
        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
            {{ session('status_profil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <hr>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-group mb-3">
            <label for="name" class="form-label fs-16">Name</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label fs-16">Email</label>
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required readonly autocomplete="username">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex items-center gap-4 mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>


        </div>
    </form>
</section>
