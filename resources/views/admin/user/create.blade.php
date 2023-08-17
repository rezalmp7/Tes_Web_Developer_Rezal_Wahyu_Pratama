@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}/user">User</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                Tambah User
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="inputNama">Nama</label>
                                        <input class="form-control" id="inputNama" name="nama" type="text" placeholder="name@example.com" required />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="inputEmail">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="laki-laki" name="jenis_kelamin" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="perempuan" name="jenis_kelamin" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputTempatLahir">Tempat Lahir</label>
                                        <input class="form-control" id="inputTempatLahir" name="tempat_lahir" type="text" placeholder="name@example.com" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputTanggalLahir">Tanggal Lahir</label>
                                        <input class="form-control" id="inputTanggalLahir" name="tanggal_lahir" type="date" placeholder="name@example.com" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputAlamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="inputAlamat" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmail">Email</label>
                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection