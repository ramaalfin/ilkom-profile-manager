@extends('layouts.app')

@section('content')
{{-- SLIDER --}}
<header id="main-slide">
    <div id="mySlide" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#mySlide" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#mySlide" data-bs-slide-to="1"></li>
            <li data-bs-target="#mySlide" data-bs-slide-to="2"></li>
        </ol>

        <div class="carousel-inner text-white">
            <div class="carousel-item active" id="slide1">
                <div class="cointainer">
                    <div class="d-none d-md-block">
                        <h1 class="display-1 bg-info px-4 pb-2 d-inline-block">
                            Get <strong>Inspired</strong>
                        </h1>
                        <br>
                        <p class="bg-dark px-2 pb-1 d-inline-block">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus optio iure cum sequi animi in molestiae distinctio esse id soluta quibusdam, nesciunt nobis rem facilis, eligendi voluptates illo quas repellendus.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" id="slide2">
                <div class="cointainer">
                    <div class="d-none d-md-block">
                        <h1 class="display-1 bg-info px-4 pb-2 d-inline-block">
                            Take <strong>Action</strong>
                        </h1>
                        <br>
                        <p class="bg-info px-2 pb-1 d-inline-block">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus optio iure cum sequi animi in molestiae distinctio esse id soluta quibusdam, nesciunt nobis rem facilis, eligendi voluptates illo quas repellendus.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" id="slide3">
                <div class="cointainer">
                    <div class="d-none d-md-block">
                        <h1 class="display-1 bg-info px-4 pb-2 d-inline-block">
                            Be <strong>Social</strong>
                        </h1>
                        <br>
                        <p class="bg-dark px-2 pb-1 d-inline-block">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus optio iure cum sequi animi in molestiae distinctio esse id soluta quibusdam, nesciunt nobis rem facilis, eligendi voluptates illo quas repellendus.</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#mySlide" class="carousel-control-prev" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a href="#mySlide" class="carousel-control-next" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<section id="member-list" class="py-5 bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Member List</h1>
                <hr class="w-25 mx-auto">
                <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga harum animi id itaque, dignissimos, asperiores ullam voluptas laboriosam beatae repudiandae ab soluta tempora maiores dolor dolorem voluptatum ducimus temporibus mollitia.</p>
    
                @if (session()->has('pesan'))
                    @if(session()->get('pesan') == 'update')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data {{ session()->get('nama') }} berhasil diubah
                            <button type="button" class="btn-close w-50" data-dismiss="alert" aria-label="Close">
                                
                            </button>
                        </div>
                        
                    @endif
                    @if(session()->get('pesan') == 'delete')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data {{ session()->get('nama') }} berhasil dihapus
                            <button type="button" class="btn-close w-50" data-dismiss="alert" aria-label="Close">
                                
                            </button>
                        </div>
                    @endif
                @endif
            </div>
    
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @forelse ($users as $user)
                <div class="col mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('img/gambar' . $user->background_profil . '.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/'.$user->gambar_profil) }}" class="rounded-circle img-thumbnail">
                            <h5 class="card-title">{{ $user->nama }}</h5>
                            <p class="card-text">{{ $user->bio_profil ?? ". . ." }}</p>
                            <ul class="fa-ul text-start">
                                <li class="mb-2">
                                    <span class="fa-li"><i class="far fa-clock"></i></span>
                                    Join in {{ date('F Y', strtotime($user->created_at)) }}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-briefcase"></i></span>
                                    {{ $user->pekerjaan }}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-home"></i></span>
                                    {{ $user->kota }}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-birthday-cake"></i></span>
                                    {{ date_diff(date_create($user->tanggal_lahir), date_create('now'))->y }} tahun
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-envelope"></i></span>
                                    {{ $user->email }}
                                </li>
                            </ul>
    
                            {{-- tombol edit dan delete hanya untuk admin --}}
                            @can('update', $user)
                                <div class="btn-action">
                                    <a href="{{ '/users/' . $user->id . '/edit' }}" class="btn btn-primary d-inline-block">Edit</a>
                                    <button class="btn btn-danger btn-hapus" data-id={{ $user->id }} data-bs-toggle="modal" data-bs-target="#DeleteModal">Hapus</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                @empty
                    <p class="lead">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Konfirmasi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center mb-0">Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

{{-- Modal konfirm delete --}}
