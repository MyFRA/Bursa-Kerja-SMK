<div class="widgets nav-list-page card rounded-0 mb-3">
    <div class="card-body">
        <h4 class="widget-title">{{__('Artikel Populer')}}</h4>
        @foreach ($artikelPopuler as $item)
            <hr>
            <div class="d-flex">
                <img src="{{ asset('/storage/assets/artikel/' . $item->image) }}" width="60px" height="60px" style="object-fit: cover; object-position: center; flex: 1" class="align-self-end mr-3 rounded" alt="...">
                <div style="flex: 3">
                    <a href="{{ url('artikel/' . $item->link) }}">
                        <h5 class="m-0 p-0">{{ __($item->judul) }}</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>