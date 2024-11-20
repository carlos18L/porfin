<!-- resources/views/insumos/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Insumos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Insumos</h1>

        <!-- Formulario de importación -->
        <form action="{{ route('insumos.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
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

        <!-- Tabla de Insumos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Obra</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Código</th>
                    <th>Concepto</th>
                    <th>Unidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->id }}</td>
                        <td>{{ $insumo->obra }}</td>
                        <td>{{ $insumo->cantidad }}</td>
                        <td>{{ $insumo->descripcion }}</td>
                        <td>{{ $insumo->estado }}</td>
                        <td>{{ $insumo->codigo }}</td>
                        <td>{{ $insumo->concepto }}</td>
                        <td>{{ $insumo->unidad }}</td>
                        <td>{{ $insumo->fecha }}</td>
                        <td>
                            <!-- Opciones CRUD -->
                            <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display:inline-block;">
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
        {{ $insumos->links() }}
    </div>
</body>
</html>
