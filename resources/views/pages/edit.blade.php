@extends('template.template')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="{{url('/employee/update-employee',$employee->id)}}" method="post">
                @csrf

                @method('put')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="name" value="{{$employee->name}}" type="nama" class="form-control" id="nama" autocomplete="no">
                </div>
                <div class="mb-3">
                    <label for="Asal" class="form-label">Asal</label>
                    <input name="address" value="{{$employee->address}}" type="Asal" class="form-control" id="Asal" autocomplete="no">
                </div>
                <div class="mb-3">
                    <label for="Telepon" class="form-label">Telepon</label>
                    <input name="phone" value="{{$employee->phone}}" type="Telepon" class="form-control" id="Telepon" autocomplete="no">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select name="gender" class="form-control" id="exampleFormControlSelect1">
                        <option {{$employee->gender === 'pria' ? "selected" : ""}} value="pria">Pria</option>
                        <option {{$employee->gender === 'wanita' ? "selected" : ""}} value="wanita">Wanita</option>

                    </select>
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection