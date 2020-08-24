@extends('layouts.app')

@section('content')
    <hr>
    <h4>Editar categoria</h4>
    <hr>
    <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="name">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $category->status }}">
        </div>

        <hr>
        <div>
            <button type="submit" class="btn btn-md btn-success">ATUALIZAR</button>
        </div>
    </form>
@endsection
