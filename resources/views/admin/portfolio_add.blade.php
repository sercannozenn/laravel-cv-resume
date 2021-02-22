@extends('layouts.admin')
@section('title')
    Portfolio Yönetimi
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/ckeditor/samples/css/samples.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title">Portfolio Yönetimi</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portfolio Yönetimi</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="portfolioForm" method="POST"
                          action="{{ isset($portfolio) ? route('portfolio.update', ['portfolio' => request('portfolio')]) : route('portfolio.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        @isset($portfolio)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Başlık"
                                   value="{{ $portfolio->title ?? '' }}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiketler</label>
                            <input type="text" class="form-control" name="tags" id="tags"
                                   placeholder="Etiketler"
                                   value="{{ $portfolio->tags ?? '' }}">
                            @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about">Portfolio Hakkında</label>
                            <textarea cols="80" id="about" name="about"
                                      rows="10">{!! $portfolio->about ?? '' !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" id="website"
                                   placeholder="Website"
                                   value="{{ $portfolio->website ?? '' }}">
                            @error('website')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" name="keywords" id="keywords"
                                   placeholder="Keywords"
                                   value="{{ $portfolio->keywords ?? '' }}">
                            @error('keywords')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="Description"
                                   value={{ $portfolio->description ?? '' }}"">
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @isset($portfolio)
                        @else
                            <div class="form-group">
                                <label for="images">
                                    Porfolio Görselleri
                                </label>
                                <br>
                                <input type="file" multiple name="images[]" id="images">
                                @if ($errors->has('images.*'))
                                    @foreach($errors->get('images.*') as $key => $value)
                                        <div class="alert alert-danger">{{ $errors->first($key) }}</div>
                                    @endforeach
                                @endif
                            </div>
                        @endisset
                        <div class="form-group">
                            <div class="form-check form-check-success">
                                <label class="form-check-label" for="status">
                                    <input type="checkbox" name="status" id="status" class="form-check-input"
                                        {{ isset($portfolio) ? ($portfolio->status ? 'checked' : '') : '' }}>
                                    Status
                                </label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mr-2"
                                id="createButton">{{ isset($portfolio) ? 'Güncelle' : 'Kaydet' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src=" {{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        var about = CKEDITOR.replace('about', {
            extraAllowedContent: 'div',
            height: 150
        });
        @isset($portfolio)
        $('#createButton').click(function ()
        {
            if ($('#title').val().trim() == '')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı !',
                    text: "Başlık alanı boş bırakılamaz.",
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#tags').val().trim() == '')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı !',
                    text: "Etiket alanı boş bırakılamaz.",
                    confirmButtonText: "Tamam"
                });
            }
            else
            {
                $('#portfolioForm').submit();
            }
        });
        @else
        $('#images').change(function ()
        {
            let images = $(this);
            let imageCheckStatus = imageCheck(images);
        });

        function imageCheck(images)
        {
            console.log(images.val());

            let length = images[0].files.length;
            let files = images[0].files;
            let checkImage = ['png', 'jpg', 'jpeg'];
            for (let i = 0; i < length; i++)
            {
                let type = files[i].type.split('/').pop();
                let size = files[i].size;
                if ($.inArray(type, checkImage) == '-1')
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Uyarı !',
                        text: "Seçilen " + files[i].name + "'ine sahip resim belirlenen formatlarda değildir. .png, .jpg, .jpeg formatlarından birisi olmalıdır.",
                        confirmButtonText: "Tamam"
                    });
                    return false;
                }
                if (size > 2048000)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Uyarı !',
                        text: "Seçilen " + files[i].name + "'i resmi 2MB'tan fazla olamaz.",
                        confirmButtonText: "Tamam"
                    });
                    return false;
                }
            }

            return true;
        }

        $('#createButton').click(function ()
        {
            let imageCheckStatus = imageCheck($('#images'));

            if (!imageCheckStatus)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı !',
                    text: "Seçtiğiniz resimleri kontrol edin.",
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#title').val().trim() == '')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı !',
                    text: "Başlık alanı boş bırakılamaz.",
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#tags').val().trim() == '')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı !',
                    text: "Etiket alanı boş bırakılamaz.",
                    confirmButtonText: "Tamam"
                });
            }
            else
            {
                $('#portfolioForm').submit();
            }
        });
        @endisset
    </script>
@endsection
