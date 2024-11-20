<!DOCTYPE html>
<html>
<head>
    <title>Materiales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Materiales</h1>
        @if ($materials->isNotEmpty())
    <h2>De la obra: {{ $materials->first()->obra }}</h2>
@else
    <h2>No hay materiales disponibles</h2>
@endif



       
        <!-- Formulario de Importación -->
        <form action="{{ route('materials.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Importar Excel</button>
                </div>
            </div>
        </form>

        <!-- Tabla de Materiales -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Concepto</th>
                    <th>Unidad</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->codigo }}</td>
                        <td>{{ $material->concepto }}</td>
                        <td>{{ $material->unidad }}</td>
                        <td>{{ $material->fecha }}</td>
                        <td>{{ $material->cantidad }}</td>
                       
                        <td>
                            <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $materials->links() }}
    </div>
</body>
</html>
