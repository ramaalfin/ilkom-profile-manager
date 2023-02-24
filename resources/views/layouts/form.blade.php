<div class="mb-3 row">
    <label for="email" class="col-md-3 col-form-label text-md-end">Email </label>
    <div class="col-md-6">
        <input type="email" name="email" id="email" class="form-control @error('email')
            is-invalid
        @enderror" value="{{ old("email") ?? $user->email ?? '' }}">
        
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

@if($tombol == "Daftar")

<div class="mb-3 row">
    <label for="password" class="col-md-3 col-form-label text-md-end">Password </label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="password-confirm" class="col-md-3 col-form-label text-md-end"> Ulangi Password </label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
    </div>
</div>

@endif

<div class="mb-3 row">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama</label>
    <div class="col-md-6">
        <input id="nama" type="text" autocomplete="nama" class="form-control 
        @error('nama') 
            is-invalid 
        @enderror" name="nama" value="{{ old('nama') ?? $user->nama ?? '' }}">

        @error('nama')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="tanggal_lahir" class="col-md-3 col-form-label text-md-end">Tanggal Lahir</label>
    <div class="col-md-6">
        <div class="row g-2">
            <div class="col-3">
                <input type="number" name="tgl" id="tgl" class="form-control col-md-3 d-inline @error('tanggal_lahir') 
                    is-invalid 
                @enderror" placeholder="dd" value="{{ old('tgl') ??  $user->tgl ?? '' }}">
            </div>

            <div class="col-5">
                @php
                // Siapkan nama-nama bulan dalam bahasa Indonesia
                $namaBulan = ["Januari","Februari","Maret","April", "Mei","Juni","Juli","Agustus","September", "Oktober","November","Desember"];
                @endphp
                
                <select class="form-select col-md-4 d-inline 
                @error('tanggal_lahir') 
                    is-invalid 
                @enderror" style="vertical-align: baseline;" name="bln" id="bln">
                    @for ($i = 0; $i < 12; $i++)
                        @if ($i+1 == (old('bln') ?? $user->bln ?? ''))
                        <option value="{{$i+1}}" selected>{{ $namaBulan[$i] }}</option>
                        @else
                        <option value="{{$i+1}}">{{ $namaBulan[$i] }}</option>
                        @endif
                    @endfor
                </select>
            </div>

            <div class="col-4">
                <input type="number" id="thn" class="form-control col-md-3 d-inline 
                @error('tanggal_lahir') 
                    is-invalid 
                @enderror" name="thn" placeholder="yyyy" value="{{ old('thn') ?? $user->thn ?? ''}}">
            </div>
            
            @error('tanggal_lahir')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
    
<div class="mb-3 row">
    <label for="pekerjaan" class="col-md-3 col-form-label text-md-end">
        Pekerjaan
    </label>

    <div class="col-md-6">
        <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') ?? $user->pekerjaan ?? '' }}"> 
        
        @error('pekerjaan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="kota" class="col-md-3 col-form-label text-md-end">Kota </label>
    <div class="col-md-6">
        <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') ?? $user->kota ?? ''}}"> 
        @error('kota')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="bio_profil" class="col-md-3 col-form-label text-md-end">Bio Profil</label>
    <div class="col-md-6">
        <textarea class="form-control" id="bio_profil" name="bio_profil" placeholder = "Bio singkat anda...">{{old('bio_profil') ?? $user->bio_profil ?? ''}}</textarea>
        
        @error('bio_profil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="gambar_profil" class="col-md-3 col-form-label text-md-end">Gambar Profil</label>
    <div class="col-md-6">
        <img id="display_gambar_profil" class="img-thumbnail w-25 mb-2"
        @if ($tombol == 'Daftar')
            src="{{ asset('img/default_profile.jpg') }}"
        @elseif ($tombol == 'Update')
            src="{{ asset('storage/uploads/'.$user->gambar_profil) }}"
        @endif>
        <input type="file" id="gambar_profil" name="gambar_profil" accept="image/*" class="form-control @error('gambar_profil') is-invalid @enderror">
        
        @error('gambar_profil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="background_profil" class="col-md-3 col-form-label text-md-end">Background Profil</label>
    <div class="col-md-6">
        <select name="background_profil" class="form-select col-md-5
            @error('background_profil') is-invalid @enderror" id="background_profil" >
            @for ($i = 1; $i <= 12; $i++)
                @if($i == (old('background_profil') ?? $user->background_profil ?? ''))
                <option value="{{ $i }}" selected >{{ 'Gambar '.$i }}</option>
                @else
                <option value="{{ $i }}">{{ 'Gambar '.$i }}</option>
                @endif
            @endfor
        </select>
        @error('background_profil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <div class="my-2 row row-cols-3 g-1">
            @for ($i = 1; $i <= 12; $i++)
            <div class="pilihan-background-profil">
                <div class='overlay'>{{ $i }}</div>
                <img class="col img-thumbnail" src="{{asset('img/gambar'.$i.'.jpg')}}">
            </div>
            @endfor
        </div>
    </div>
</div>

<div class="mb-3 row mb-0">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary px-4">{{$tombol}}</button>
    </div>
</div>
