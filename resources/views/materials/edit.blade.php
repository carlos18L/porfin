<!DOCTYPE html>
<html>
<head>
    <title>Editar Material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Editar Material</h1>

        <form action="{{ route('materials.update', $material->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $material->codigo }}" required>
            </div>

            <div class="mb-3">
                <label for="concepto" class="form-label">Concepto</label>
                <input type="text" id="concepto" name="concepto" class="form-control" value="{{ $material->concepto }}" required>
            </div>

            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad</label>
                <input type="text" id="unidad" name="unidad" class="form-control" value="{{ $material->unidad }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" value="{{ $material->fecha }}" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ $material->cantidad }}" required>
            </div>

            <div class="mb-3">
                <label for="obra" class="form-label">Obra</label>
                <input type="text" id="obra" name="obra" class="form-control" value="{{ $material->obra }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('materials.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
