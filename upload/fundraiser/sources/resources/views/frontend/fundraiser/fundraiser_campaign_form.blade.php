@php
    $category = DB::table('fundraiser_categories')->get();
    $id = auth()->user()->id;
    
@endphp


<main class="main my-4">
    <div class="">
        <div class="fixsize">
            <div class="headline_size">
                <h3>Please fill in your information</h3>
            </div>
            <div class="campaign-form">
                <form action="{{ route('fundraiser.store') }}" method="post" enctype="multipart/form-data">
                    @csrf



                    {{-- For title --}}
                    <div class="title fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Give your fundraiser a
                            title</label>
                        <div class="title-form-field">
                            <input type="text" name="title" class="form-control active"
                                id="exampleFormControlInput1" placeholder="Donate to help..."
                                value="{{ old('title') }}">
                            <h3 class="title-max-text">50</h3>
                        </div>
                        <small class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    {{-- for Story --}}
                    <div class="fund-form-group">
                        <label for="exampleFormControlTextarea1" class="form-label texts_size">Example
                            textarea</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            placeholder="Hi, my name is Jane and I'm fundraising for... " value="{{ old('description') }}"></textarea>
                    </div>
                    <small class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </small>

                    {{-- For category --}}
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Which category do you
                            select?</label>

                        <div class="starting-goal-input">
                            <select class="form-control text_16 " name="categories_id">
                                <option class="pera_text">Open this select menu</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <small class="text-danger">
                        @error('categories_id')
                            {{ $message }}
                        @enderror
                    </small>

                    {{-- For amount --}}
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How much would you like to
                            raise?</label>

                        <div class="starting-goal-input d-flex">
                            <input type="number" name="goal_amount" class="form-control text_16 " placeholder="00"
                                required value="" value="{{ old('goal_amount') }}">
                            <h3 class="amount-add-btn">AUD</h3>
                        </div>
                    </div>
                    <small class="text-danger">
                        @error('goal_amount')
                            {{ $message }}
                        @enderror
                    </small>

                    {{-- for ending date --}}
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How long will the campaign
                            last?</label>
                        <div class="starting-goal-input">
                            <input type="date" name="timestamp_end" class="form-control text_16"
                                value="{{ old('timestamp_end') }}">
                        </div>
                    </div>
                    <small class="text-danger">
                        @error('timestamp_end')
                            {{ $message }}
                        @enderror
                    </small>

                    {{-- for cover photos --}}
                    <div class="fund-form-group">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label texts_size">Add a cover photo or
                                video</label>
                        </div>
                        <div>
                            <div class="img-file-drag">
                                <div class="image-upload">
                                    <input type="file" name="cover_photo" id="logo" onchange="fileValue(this)">
                                    <label for="logo" class="upload-field" id="file-label">
                                        <div class="file-thumbnail">
                                            <img id="image-preview"
                                                src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/file-image.png') }}"
                                                alt="image">
                                            <h3 class="browse-option text_20">
                                                Drop your image here, or <span>browse</span>
                                            </h3>
                                            <p class="file-img-type">Supports; JPG, JPEG2000, PNG</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- for button --}}
                    <div>
                        <input type="submit" class="btn_fundraiser" value="Complete Fundraiser">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
