@extends('layouts.app')

@section('content')
    <hr>
    <h4>Cadastrar Categoria</h4>
    <hr>
    <form action="{{ route('admin.categories.create') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="name">Slug</label>
            <input type="text" name="slug" id="name" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="">
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-md btn-success">SALVAR</button>
        </div>
    </form>

@endsection
