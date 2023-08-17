@extends('admin.layouts.layoutAdmin')

@section('content')
    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kustomer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kustomer</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header clearfix">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                                <a href="{{ url('/') }}/kustomer/create" class="btn btn-sm btn-success float-end">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kustomer</th>
                                            <th>Jenis Kelamin</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>
                                                {{ $user->nama }}
                                                <hr class="m-0 p-0" />
                                                {{ $user->email }}
                                            </th>
                                            <th>{{ $user->jenis_kelamin }}</th>
                                            <th>{{ $user->tempat_lahir }}, {{ date("d-m-Y", strtotime($user->tanggal_lahir)) }}</th>
                                            <th>{{ $user->alamat }}</th>
                                            <th>
                                                <form onsubmit="confirm('Apakah ingin menghapus kustomer')" action="{{ route('kustomer.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('kustomer.edit',$user->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection