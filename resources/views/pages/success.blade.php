@extends('layouts.success')

@section('title', 'Success Store Page')

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
    <div class="container">
        <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
            <img src="/images/success.svg" alt="" class="mb-4" />
            <h2>Transaction Processed!</h2>
            <p>
            Silahkan tunggu konfirmasi email dari kami dan kami akan
            menginformasikan resi secepat mungkin!
            </p>
            <a href="/dashboard.html" class="btn btn-success w-50 mt-4">
            My Dashboard
            </a>
            <a href="/index.html" class="btn btn-sign-up w-50 mt-2">
            Go to Shopping
            </a>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection