@extends('Layouts.UserTemplete')

@section('content')
<div class="py-4">
    <div class="py-4 d-flex flex-row align-items-center justify-content-center">
        <h3 class="m-0 font-weight-bold">LAPOR KEBERADAAN ORMAS</h3>
    </div>

    <div class="btn-group d-flex align-items-center justify-content-center ">
        <a href="/alur-lapor" class="btn btn-link text-dark alur-lapor {{ request()->is('alur-lapor*') ? 'border-bottom-right' : '' }}">Alur Lapor Keberadaan Ormas</a>
        <a href="/register" class="btn btn-link text-dark register-ormas {{ request()->is('register*') ? 'border-top-active' : '' }}">Formulir Lapor Keberadaan Ormas</a>
        <a href="/search" class="btn btn-link text-dark search-ormas {{ request()->is('search*') ? 'border-bottom-left' : '' }}">Revisi Lapor Keberadaan Ormas</a>
    </div>
    
    <div class="py-2 text-center align-items-center justify-content-center" id="gambar-alur-lapor">
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        function getData() {
            $.ajax({
                url: `/v1/flow-report`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response && response.data && response.data.length > 0) {
                        let imageUrl = "/uploads/file-alur-report/" + response.data[0].file_alur_lapor;
                        $("#gambar-alur-lapor").html(`<img src="${imageUrl}" class="img-fluid" alt="">`);
                    } else {
                        $("#gambar-alur-lapor").html("<p>Tidak ada gambar yang tersedia</p>");
                    }
                },
                error: function() {
                    console.log("Gagal mengambil data dari server");
                    $("#gambar-alur-lapor").html("<p>Gagal mengambil data gambar dari server</p>");
                }
            });
        }
        getData();
    });
</script>
@endsection
