@extends('layouts.admin')
@section('title')
    Portfolio Listesi
@endsection
@section('css')
    <style>
        .table th img, .jsgrid .jsgrid-table th img, .table td img, .jsgrid .jsgrid-table td img {
            width: 100px;
            height: unset !important;
            border-radius: unset !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Portfolio Listesi</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Portfolio Listesi</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-block"> Yeni Portfolio
                                Ekle</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>Öne Çıkarılan Resim</th>
                                <th>Başlık</th>
                                <th>Etiketler</th>
                                <th>Hakkında</th>
                                <th>Status</th>
                                <th>Eklenme Tarihi</th>
                                <th>Güncellenme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr id="{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ route('portfolio.edit', ['portfolio' => $item->id]) }}"
                                           class="btn btn-warning editEducation">Düzenle <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td><a data-id="{{ $item->id }}" href="javascript:void(0)"
                                           class="btn btn-danger deleteEducation">Sil <i class="fa fa-trash"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{ route('portfolio.showImages', ['id' => $item->id]) }}">
                                            <img
                                                src="{{ $item->featuredImage ? asset('storage/portfolio/' . $item->featuredImage->image) : '-' }}"
                                                width="150">
                                        </a>
                                    </td>

                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->tags }}</td>
                                    <td title="{{ strip_tags($item->about) }}">{{ strip_tags(substr($item->about, 0 ,50)) }}</td>
                                    <td>
                                        @if ($item->status)
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)"
                                               class="btn btn-success changeStatus">Aktif
                                            </a>
                                        @else
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->updated_at)->format("d-m-Y H:i:s") }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        });

        $('.changeStatus').click(function ()
        {
            let educationID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{ route('portfolio.changeStatus') }}",
                type: "POST",
                async: false,
                data: {
                    id: educationID
                },
                success: function (response)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı !',
                        text: response.portfolioID + " ID'li kayıt durumu " + response.newStatus + " olarak güncellenmiştir.",
                        confirmButtonText: "Tamam"
                    });


                    if (response.status == 1)
                    {
                        self[0].innerHTML = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");
                    }
                    else if (response.status == 0)
                    {
                        self[0].innerHTML = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");
                    }

                },
                error: function ()
                {

                }
            });
            // }).done(function ()
            // {
            //
            // }).fail(function ()
            // {
            //
            // });

        });


        $('.deleteEducation').click(function ()
        {
            let educationID = $(this).attr('data-id');

            Swal.fire({
                title: "Emin misiniz?",
                text: educationID + " ID'li portfolio bilgisini silmek istediğinize emin misiniz? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
            }).then((result) =>
            {
                if (result.isConfirmed)
                {
                    let route = '{{ route('portfolio.destroy', ['portfolio' => 'deletePortfolio']) }}';
                    let finalRoute = route.replace('deletePortfolio', educationID);
                    $.ajax({
                        url: finalRoute,
                        // method: "POST"
                        type: "POST",
                        async: false,
                        data: {
                            portfolio: educationID,
                            '_method': 'DELETE'
                        },
                        success: function (response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı !',
                                text: "Silme işlemi başarılı.",
                                confirmButtonText: "Tamam"
                            });
                            $("tr#" + educationID).remove();

                        },
                        error: function ()
                        {

                        }
                    });
                }
            })


        });

    </script>
@endsection
