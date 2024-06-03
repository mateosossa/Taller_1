<!-- resources/views/categories/edit.blade.php -->

<h1>Editar Categoría</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
