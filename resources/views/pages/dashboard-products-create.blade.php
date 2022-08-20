@extends('layouts.dashboard')

@section('title', 'Store Dashboard Products Create')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Create New Product</h2>
        <p class="dashboard-subtitle">Create your own product</p>
        </div>
        <div class="dashboard-content">
        <div class="row">
            <div class="col-12">
            <form action="">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Product Name</label>
                        <input
                            type="text"
                            class="form-control"
                            value="Papel La Casa"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Price</label>
                        <input
                            type="number"
                            class="form-control"
                            value="$100.00"
                        />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option value="Shipping" disabled>
                            Select Category
                            </option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="editor" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Thumbnails</label>
                        <input type="file" class="form-control" />
                        <p class="text-muted">
                            Kamu dapat memilih lebih dari satu file
                        </p>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <button
                        type="submit"
                        class="btn btn-success btn-block"
                        >
                        Create Product
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
@endpush