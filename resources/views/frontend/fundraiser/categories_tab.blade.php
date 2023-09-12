<div class="row">
    <div class="col-md-12">
        <div class="category-area">
            @if (isset($type))
                <div class="category-title d-flex justify-content-between">
                    <h3 class="text_22">Browse Categories</h3>
                    <a href="{{ route('fundraiser.create') }}" class="btn_1">Create Fundraise</a>
                </div>
                <ul class="category-list">
                    @foreach ($category as $row)
                        <a href="{{ route('fundraiser.category', $row->id) }}">
                            <li class="single-category">
                                <img src="{{ asset('assets/frontend/images/fr_category/' . $row->name . '.svg') }}"
                                    alt="popular">
                                <h4 class="text_16">{{ $row->name }}</h4>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @else
                <div class="col-lg-12 d-flex justify-content-between blog-type custom_margin">
                    <h3 class="text_22">{{ $section_head }}</h3>
                </div>

                <div class="col-12 ">
                    <div class="blog-area">
                        <div class="row">
                            @include('frontend.fundraiser.categoryBy')
                        </div>
                    </div>
                </div>
                {{-- <pre>{{ print_r($campaign_by_category) }}</pre> --}}
                {{-- <p>{{ dd($campaign_by_category->toArray()) }}</p> --}}
            @endif
        </div>
    </div>
</div>
