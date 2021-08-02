<div class="container">

    @foreach ($article as $item)

    <div class="card">
        <div class="card-header" id="headingOne">
            <h4><a href="{{ route('admin.detailarticle', $item->id)}}">{{ ucfirst($item->title)}}</a> </h4>
        </div>
        <div class="card-body">
            {!! substr($item->article, 0, 100000). '...' !!}
            <div style="float: right">
                <p> {{ $item->created_at->diffforhumans() }}</p>

                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter{{ $item->id }}">
                    Delete Article
                </button>
                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Action
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are You Sure Want Delete?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>

                                <form action="{{ route('admin.deletearticle', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach


    <div class="text-center align-middle">
        {{ $article->links() }}
    </div>
</div>