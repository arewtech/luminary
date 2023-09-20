<!-- Button trigger modal -->
<div class="modal fade" id="bookDetail{{ $item->slug }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable" style="width: 340px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize">
                    {{ $item->title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-0">
                    <img style="object-fit: cover; object-position: center;"
                        src="{{ $item->cover !== null ? asset('storage/' . $item->cover) : 'https://ui-avatars.com/api/?name=' . $item->title . '&color=7F9CF5&background=EBF4FF' }}"
                        class="card-img-top" with="100%" height="200px" alt="{{ $item->title }}">
                    <div class="card-body">
                        <h3 class="card-title pb-0 mb-0 pt-3">{{ $item->title }}</h3>
                        <div class="d-flex align-items-center gap-1 mt-2 flex-wrap">
                            @foreach ($item->categories as $category)
                                <span class="badge text-lowercase bg-secondary rounded-2">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <span class="font-weight-normal text-secondary form-text">Author :
                            <span class="font-weight-bold">{{ $item->author }}</span></span>
                        <hr class="mt-2">
                        <p class="card-text mt-2 form-text line-clamp">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Button trigger modal -->
