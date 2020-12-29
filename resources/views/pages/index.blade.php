@extends('template.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$employee->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Karyawan Wanita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$employee->where('gender','wanita')->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Karyawan Pria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$employee->where('gender','pria')->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="d-flex justify-content-between">

                <h1 class="">Data Pegawai</h1>
                <!-- Button trigger modal -->
                <button type="button" class="align-self-center btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>

            </div>
        </div>



    </div>
    <div class="row">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employee)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td style="text-transform: capitalize;">{{$employee->name}}</td>
                    <td style="text-transform: capitalize;">{{$employee->address}}</td>
                    <td style="text-transform: capitalize;">{{$employee->gender}}</td>
                    <td style="text-transform: capitalize;">{{$employee->phone}}</td>
                    <td>
                        <form action="{{url('/employee/delete-employee')}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{$employee->id}}" id="">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <a href="{{url('/employee/edit-employee',$employee->id)}}" class="btn btn-warning">Edit</a>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>

            </div>

            <form action="{{url('/employee/store-employee')}}" method="post">
                @csrf
                <div class="modal-body">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="name" type="nama" class="form-control" id="nama" autocomplete="no">
                    </div>
                    <div class="mb-3">
                        <label for="Asal" class="form-label">Asal</label>
                        <input name="address" type="Asal" class="form-control" id="Asal" autocomplete="no">
                    </div>
                    <div class="mb-3">
                        <label for="Telepon" class="form-label">Telepon</label>
                        <input name="phone" type="Telepon" class="form-control" id="Telepon" autocomplete="no">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select name="gender" class="form-control" id="exampleFormControlSelect1">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection