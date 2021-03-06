@extends('template.master')

@section('judul', 'Data Mahasiswa')

@section('isi')

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Tambah Data Mahasiswa</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $errors)
                                    <li>{{ $errors }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.getDataM') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nims">Nim</label>
                                    <input type="number" id="nims" name="nim" value="{{old('nim')}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nm">Nama</label>
                                    <input type="text" id="nm" name="nama_mahasiswa" value="{{old('nama_mahasiswa')}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="smt">Semester</label>
                                    <input type="number" id="smt" name="semester" value="{{old('semester')}}" class="form-control">
                                </div>
                                <!-- <div class="form-group mb-3">
                                <label for="ss">TEXT</label>
                                <textarea name="txtisi" id="ss" cols="30" rows="2"></textarea>
                            </div> -->
                                <input type="submit" name="submit" value="Simpan Data">
                            <a class="btn btn-default" href="{{ url('data-mahasiswa') }}" role="button">Kembali</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection