@extends('layouts/plantilla')
@section('contenido')
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark tex-white">Editar computador</div>
            <div class="card-body">
                <form id="frmEstados" method="POST" action="{{url('computadores',[$computador])}}">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                        <input type="text" name="ID_Portatilesp" value="{{ $computador->ID_Portatilesp}}" class="form-control" maxlength="50" placeholder="ID" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                        <input type="text" name="Tag" value="{{ $computador->Tag}}" class="form-control" maxlength="50" placeholder="Tag" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                        <input type="text" name="Modelo" value="{{ $computador->Modelo}}" class="form-control" maxlength="50" placeholder="Modelo" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-boxes-stacked"></i></span>
                        <input type="text" name="Inventario" value="{{ $computador->Inventario}}" class="form-control" maxlength="50" placeholder="Inventario" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                        <input type="text" name="Especificaciones" value="{{ $computador->Especificaciones}}" class="form-control" maxlength="50" placeholder="Especificaciones" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="Carrera" value="{{ $computador->Carrera}}" class="form-control" maxlength="50" placeholder="Carrera" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                        <select name=id_estado class="form-select" required>
                            <option value="">Estado</option>
                            @foreach($estados as $row)
                                @if ($row->id == $computador->id_estado)
                                <option selected value="{{ $row->id}}">{{$row->estado}}</option>
                                @else
                                <option value="{{ $row->id}}">{{$row->estado}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success" ><i class="fa-solid fa-floppy-disk>"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection