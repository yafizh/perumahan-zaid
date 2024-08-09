@extends('dashboard.direktur.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Laporan Grafik Pemesanan
            </x-slot:title-page>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-3">
                <h5>Filter</h5>
                <form action="">
                    <div class="mb-3">
                        <label for="kuartal" class="form-label">Kuartal</label>
                        <select name="kuartal" id="kuartal" class="form-control" required>
                            <option value="" disabled selected>Pilih Kuartal</option>
                            <option value="1" {{ request('kuartal') == 1 ? 'selected' : '' }}>
                                Kuartal 1
                            </option>
                            <option value="2" {{ request('kuartal') == 2 ? 'selected' : '' }}>
                                Kuartal 2
                            </option>
                            <option value="3" {{ request('kuartal') == 3 ? 'selected' : '' }}>
                                Kuartal 3
                            </option>
                            <option value="4" {{ request('kuartal') == 4 ? 'selected' : '' }}>
                                Kuartal 4
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control text-center" name="tahun" id="tahun" min="2023"
                            value="{{ request()->get('tahun') ?? 2023 }}" required>
                    </div>
                    <hr>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/direktur/laporan/grafik-pemesanan" class="btn btn-secondary">Reset Filter</a>
                        <div>
                            <button type="submit" class="btn btn-info">Filter</button>
                            <a href="{{ $href ?? '' }}" @class(['btn', 'btn-primary', 'disabled' => !isset($href)]) target="_blank">
                                Cetak
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-9">
                @isset($chart)
                    {!! $chart->container() !!}
                @endisset
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    @isset($chart)
        {!! $chart->script() !!}
    @endisset
@endsection
