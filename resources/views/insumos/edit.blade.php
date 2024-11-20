<!DOCTYPE html>
<html>
<head>
    <title>Editar Insumo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Insumo</h1>

        <!-- Formulario de edición -->
        <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="obra" class="form-label">Obra</label>
                <input type="text" name="obra" id="obra" class="form-control" value="{{ old('obra', $insumo->obra) }}" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', $insumo->cantidad) }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $insumo->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado', $insumo->estado) }}" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" value="{{ old('codigo', $insumo->codigo) }}" required>
            </div>

            <div class="mb-3">
                <label for="concepto" class="form-label">Concepto</label>
                <input type="text" name="concepto" id="concepto" class="form-control" value="{{ old('concepto', $insumo->concepto) }}" required>
            </div>

            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad</label>
                <input type="text" name="unidad" id="unidad" class="form-control" value="{{ old('unidad', $insumo->unidad) }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $insumo->fecha) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
