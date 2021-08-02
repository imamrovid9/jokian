@extends('layouts.app')
@section('content')
<div class="container">
    <div class="pt-5">
        @include('auth.article.paginate.index')
    </div>
</div>
@endsection