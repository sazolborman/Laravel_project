<div class="page-wrap">
    <div class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><img width="12" src="{{ asset('assets/frontend/images/stickies-fill.png') }}" alt=""></span> {{ get_phrase('Create New Article') }}</h3>
       
    </div>
    <div class="card mt-3 px-3 py-4">
        <div class="create-article">
            @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="#">{{ get_phrase('Title') }}</label>
                    <input type="text" name="title" placeholder="Enter your title">
                </div>
                <div class="form-group">
                    <label for="#">{{ get_phrase('Category') }}</label>
                    <select name="category" id="category" required class="form-control bg-secondary">
                        <option value="" selected disabled>{{ get_phrase('Select Category') }}</option>
                        @foreach ( $blog_category as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="#">{{ get_phrase('Tags') }}</label>
                    <input type="text" name="tag" class="form-control bg-secondary" placeholder="Enter your tags">
                </div>
                <div class="form-group">
                    <label for="#">{{ get_phrase('Description') }}</label>
                    <textarea name="description" id="description" class="content"  placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="#">{{ get_phrase('Image') }}</label>
                    <input type="file" name="image" id="image">
                </div>
                
                
                <div class="inline-btn mt-3">
                    <button type="submit" class="btn btn-primary w-100">{{ get_phrase('Create Post') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>




