<!-- Banner & Name -->
<div class="main-content-wraper mb-4 position-relative overflow-hidden">
    <img src="{{ asset('assets/frontend/images/' . $paid_content->cover_photo) }}" alt="banner" class="banner-img">
    <div class="profile-banner-title">
        <div class="wrapper d-flex align-items-center g-20">
            <div class="profile-img">
                <img src="{{ asset('assets/frontend/images/' . $paid_content->logo) }}" alt="" />
            </div>
            <div class="contents">
                <h3 class="fz-24-sb-22-white pb-6">{{ $paid_content->title }}</h3>
                <p class="fz-16-r-22-white">{{ $paid_content->sub_title }}</p>
            </div>
        </div>
    </div>
</div>
