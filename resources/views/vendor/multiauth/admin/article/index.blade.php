@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('admin.tambaharticle') }}" class="btn btn-primary" style="float: right" class="pb-4">Add
        Article</a>
    <div class="pt-5">
        @include('multiauth::admin.article.paginate.index')
    </div>
</div>
@endsection