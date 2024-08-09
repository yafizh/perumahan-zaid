<header class="row mb-3">
    <div class="col-12 mb-3 col-md-2 text-center">
        <img src="{{ asset('assets/images/logo1.png') }}" style="width: 100%; max-width: 12rem;">
    </div>
    <div class="col-12 mb-3 col-md-8">
        <h1 class="text-center text-md-start">{{ $titlePage }}</h1>
        <h3>PT. Karya Putra Bersaudara</h3>
    </div>
    <div class="col-12 mb-3 col-md-2 align-self-end">
        {{ $buttons ?? '' }}
    </div>
</header>
