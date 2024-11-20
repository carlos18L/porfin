<!-- resources/views/insumos/import.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Importar Insumos</title>
</head>
<body>
    <form action="{{ route('insumos.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Importar Excel</button>
    </form>
</body>
</html>
