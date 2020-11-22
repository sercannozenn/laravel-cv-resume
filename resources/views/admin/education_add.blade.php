@extends('layouts.admin')

@php

    if ($education)
        {
            $educationText= "Eğitim Düzenleme";
        }
        else
        {
         $educationText= "Yeni Eğitim Ekleme";
        }

@endphp

@section('title')
    {{ $educationText }}
@endsection
@section('css')
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title">{{ $educationText }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.education.list') }}">Eğitim Bilgileri Listesi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Yeni Eğitim Ekleme</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createEducationForm" method="POST" action="">
                        @csrf
                        @if ($education)
                            <input type="hidden" name="educationID" value="{{ $education->id }}">
                        @endif
                        <div class="form-group">
                            <label for="education_date">Eğitim Tarihi</label>
                            <input type="text" class="form-control" name="education_date" id="education_date"
                                   placeholder="Eğitim Tarihi"
                                   value="{{ $education ? $education->education_date : '' }}">
                            <small>Örneğin: 2012 - 2017 </small>
                            @error('education_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="education_date">Üniversite Adı</label>
                            <input type="text" class="form-control" name="university_name" id="university_name"
                                   placeholder="Üniversite Adı"
                                   value="{{ $education ? $education->university_name : '' }}">
                            @error('university_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="university_branch">Üniversite Bölüm</label>
                            <input type="text" class="form-control" name="university_branch" id="university_branch"
                                   placeholder="Üniversite Bölüm"
                                   value="{{ $education ? $education->university_branch : '' }}">
                            @error('university_branch')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" cols="30"
                                      rows="7"
                                      placeholder="Açıklama">{{ $education ? $education->description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-check form-check-success">
                                <label class="form-check-label" for="status">
                                    <?php
                                    if ($education)
                                    {
                                        $checkStatus = $education->status ? "checked" : '';
                                    }
                                    else
                                    {
                                        $checkStatus = '';
                                    }
                                    ?>
                                    <input type="checkbox" name="status" id="status" class="form-check-input" {{ $checkStatus }}>
                                    Eğitim Anasayfa da Gösterilme Durumu
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" id="createButton">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        let createButton = $("#createButton");
        createButton.click(function ()
        {
            if ($('#education_date').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Eğitim Tarihini kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#university_name').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Üniversite Adını kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#university_branch').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Üniversite Bölümünü kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else
            {
                $('#createEducationForm').submit();
            }


        });
    </script>
@endsection
