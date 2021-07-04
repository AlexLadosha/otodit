@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статьи</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Новая статья</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               id="title" placeholder="Название">
                    </div>


                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                  placeholder="Цитата ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3"
                                  placeholder="Контент ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Категория</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>


                        <div class="form-group">
                            <label for="tags">Теги</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                    data-placeholder="Выбор тегов" style="width: 100%;">
                                @foreach($tags as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Выберите файл</label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
            </form>

            <!-- /.content -->
    </section>

@endsection
