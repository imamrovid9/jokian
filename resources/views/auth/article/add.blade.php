@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/summernote/summernote-lite.min.css">


<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.postarticle') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <label for="">Article</label>
                        <textarea name="article" id="summernote" required></textarea>
                        <button type="submit" class="btn btn-primary mt-4" style="float: right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('asset/admin') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('asset/admin') }}/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('asset/admin') }}/vendors/jquery/jquery.min.js"></script>
<script src="{{ asset('asset/admin') }}/vendors/summernote/summernote-lite.min.js"></script>
<script>
    $('#summernote').attr('name', 'article').summernote({
        tabsize: 2,
        height: 120,
    })
</script>

<script src="{{ asset('asset/admin') }}/js/main.js"></script>
</body>

</html>
@endsection