@extends('/layouts/plantilla')
@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalComputadores">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead><tr><th>#</th><th>ID</th><th>TAG</th><th>MODELO</th><th>INVENTARIO</th><th>ESPECIFICACIONES</th><th>CARRERA</th><th>ESTADO</th><th>EDITAR</th><th>ELIMINAR</th></tr></thead>
                    <tbody class="table-group-divider">
                        @php $i=1; @endphp
                        @foreach($computadores as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->ID_Portatilesp }}</td>
                            <td>{{ $row->Tag }}</td>
                            <td>{{ $row->Modelo }}</td>
                            <td>{{ $row->Inventario }}</td>
                            <td>{{ $row->Especificaciones }}</td>
                            <td>{{ $row->Carrera }}</td>
                            <td>{{ $row->id_estado }}</td>
                            <td>
                                <a href="{{ url('estados',[$row]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ url('computadores', [$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEstados" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5" id="titulo_modal">Añadir computador</label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmEstados" method="POST" action="{{url("computadores")}}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                            <input type="text" name="ID_Portatilesp" class="form-control" maxlength="50" placeholder="ID" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                            <input type="text" name="Tag" class="form-control" maxlength="50" placeholder="Tag" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                            <input type="text" name="Modelo" class="form-control" maxlength="50" placeholder="Modelo" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-boxes-stacked"></i></span>
                            <input type="text" name="Inventario" class="form-control" maxlength="50" placeholder="Inventario" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                            <input type="text" name="Especificaciones" class="form-control" maxlength="50" placeholder="Especificaciones" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <input type="text" name="Carrera" class="form-control" maxlength="50" placeholder="Carrera" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-laptop"></i></span>
                            <select name=id_estado class="form-select" required>
                                <option value="">Estado</option>
                                @foreach($estados as $row)
                                <option value="{{ $row->id}}">{{$row->estado}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-success" ><i class="fa-solid fa-floppy-disk>"></i> Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
