<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Enter search post..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div>
                @if($categories->isNotEmpty())
                    @foreach ($categories as $item)
                        <span>
                            <a href="{{ url('categories/'.$item->seotitle) }}" class="bg-primary badge text-white unstyle-categories">{{ $item->title }} ({{ $item->posts_count }})</a>
                        </span>
                    @endforeach
                @else
                    <span class="text-muted">No categories available.</span>
                @endif
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Side Widget</div>
        <div class="card-body">
            <a href="https://domainesia.com" target="_blank" rel="noopener noreferrer">
                <img src="{{ $config['ads_widget'] }}" alt="ads_widget" class="img-fluid" width="70%">
            </a>
        </div>
    </div>
    <!-- Popular Post-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Popular Posts</div>
        <div class="card-body">
            @foreach ($popular_posts as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/back/'.$item->image) }}" alt="{{ $item->title }}" class="img-fluid">
                        </div>
    
                        <div class="col-md-9">
                          <div class="card-body">
                            <p class="card-title">
                                <a href="{{ url('p/'.$item->seotitle) }}">{{ $item->title }}</a>
                            </p>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>