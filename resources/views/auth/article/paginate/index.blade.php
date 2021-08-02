<div class="container">

    @foreach ($article as $item)

    <div class="card">
        <div class="card-header" id="headingOne">
            <h4><a href="{{ route('detailarticle', $item->id)}}">{{ ucfirst($item->title)}}</a> </h4>
        </div>
        <div class="card-body">
            {!! substr($item->article, 0, 100000). '...' !!}
            <div style="float: right">
                <p> {{ $item->created_at->diffforhumans() }}</p>
            </div>
        </div>
    </div>

    @endforeach


    <div class="text-center align-middle">
        {{ $article->links() }}
    </div>
</div>