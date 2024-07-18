@extends('Layouts.UserTemplete')

@section('content')
<div class="py-4">
    <div class="py-4 d-flex flex-row align-items-center justify-content-center">
        <h3 class="m-0 font-weight-bold">LAPOR KEBERADAAN ORMAS</h3>
    </div>

    <div class="d-flex justify-content-around position-relative">
        <a href="/alur-lapor" class="btn btn-link text-dark {{ request()->is('alur-lapor*') ? 'border-bottom-right' : '' }}" >Alur Lapor Keberadaan Ormas</a>
        <a href="/register" class="btn btn-link text-dark {{ request()->is('register*') ? 'border-top-active ' : '' }}">Formulir Lapor Keberadaan Ormas</a>
        <a href="/search" class="btn btn-link text-dark {{ request()->is('search*') ? 'border-bottom-left' : '' }}">Revisi Lapor Keberadaan Ormas</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Your scripts here
</script>
@endsection

