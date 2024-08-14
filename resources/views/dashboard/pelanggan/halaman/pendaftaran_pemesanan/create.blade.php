@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Pendaftaran Pemesanan</h4>
            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
        </div>
        <hr>
        @if (request()->get('nomor_rumah'))
            <div class="alert alert-success" role="alert">
                <p>
                    Segala macam transaksi ke PT. Karya Putra Bersaudara melalui transfer hanya ke rekening A
                    <br>
                    A.n Saifullah Zaid 123XXX-XXXXX-XXXXXX-XXX
                </p>
            </div>
            <form action="/pelanggan/pemesanan-rumah" method="POST" enctype="multipart/form-data">
                @csrf
                <main class="mb-3 row justify-content-center">
                    <div class="col-12">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger text-capitalize" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" name="id_rumah" id="id_rumah" value="{{ $rumah->id }}" hidden>
                        <div class="mb-3">
                            <label class="form-label">Blok Perumahan</label>
                            <input type="text" class="form-control" disabled value="{{ $rumah->blokPerumahan->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Rumah</label>
                            <input type="text" class="form-control" disabled
                                value="Rumah Nomor {{ $rumah->nomor_rumah }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Rumah</label>
                            <input type="text" class="form-control" disabled
                                value="{{ number_format($rumah->harga_penjualan, 0, ',', '.') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Pendaftaran/Pemesanan</label>
                            <input type="text" class="form-control" disabled
                                value="{{ number_format(500000, 0, ',', '.') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_beli" class="form-label">Tanggal Pembelian</label>
                            <input type="date" class="form-control" name="tanggal_beli" id="tanggal_beli" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="foto" id="foto" required
                                accept="image/*">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </div>
                </main>
            </form>
        @else
            @if (session('failed'))
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h1 class="modal-title fs-5 w-100" id="exampleModalLabel"> {{ session('failed') }}</h1>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const myModal = new bootstrap.Modal('#exampleModal', {
                        keyboard: false
                    });
                    myModal.show();
                </script>
            @endif
            <h4 class="text-center mb-3">KETERANGAN</h4>
            <div class="mb-3 gap-3 d-flex justify-content-center">
                <div class="flex-column d-flex mb-3 gap-2 align-items-center">
                    <div style="width: 3rem; height: 2rem;" class="bg-info"></div>
                    <h5>Promo</h5>
                </div>
                <div class="flex-column d-flex mb-3 gap-2 align-items-center">
                    <div style="width: 3rem; height: 2rem;" class="bg-success"></div>
                    <h5>Tersedia</h5>
                </div>
                <div class="flex-column d-flex mb-3 gap-2 align-items-center">
                    <div style="width: 3rem; height: 2rem;" class="bg-warning"></div>
                    <h5>Dipesan</h5>
                </div>
                <div class="flex-column d-flex mb-3 gap-2 align-items-center">
                    <div style="width: 3rem; height: 2rem;" class="bg-danger"></div>
                    <h5>Terjual</h5>
                </div>
            </div>

            <div class="w-100 d-flex justify-content-center">
                <img src="{{ asset('map.png') }}" usemap="#image-map" class="w-100">
            </div>

            <map name="image-map">
                <area nomor="A1" href="" coords="1107,1619,1251,1616,1297,1842,1138,1857" shape="poly">
                <area nomor="A2" href="" coords="918,1395,936,1632,1066,1622,1044,1386" shape="poly">
                <area nomor="A3" href="" coords="1044,1386,1158,1380,1177,1617,1067,1623" shape="poly">
                <area nomor="A4" href="" coords="1160,1377,1271,1369,1295,1605,1184,1616" shape="poly">
                <area nomor="A5" href="" coords="1275,1367,1376,1360,1420,1583,1300,1606" shape="poly">
                <area nomor="A6" href="" coords="1161,1056,1300,1050,1320,1247,1183,1255" shape="poly">
                <area nomor="A7" href="" coords="1024,1059,1157,1055,1180,1258,1039,1260" shape="poly">
                <area nomor="A8" href="" coords="1019,1058,884,1068,899,1263,1038,1260" shape="poly">
                <area nomor="A9" href="" coords="858,862,881,1062,1016,1058,995,859" shape="poly">
                <area nomor="A10" href="" coords="999,856,1137,850,1158,1051,1024,1059" shape="poly">
                <area nomor="B11" href="" coords="1278,843,1298,1048,1161,1055,1143,853" shape="poly">
                <area nomor="B12" href="" coords="517,1414,526,1574,801,1563,787,1407" shape="poly">
                <area nomor="B13" href="" coords="617,1096,745,1093,770,1293,643,1300" shape="poly">
                <area nomor="B14" href="" coords="488,1102,612,1095,636,1297,511,1307" shape="poly">
                <area nomor="B15" href="" coords="485,1093,358,1099,389,1307,505,1307" shape="poly">
                <area nomor="B16" href="" coords="324,902,466,896,481,1088,357,1095" shape="poly">
                <area nomor="B17" href="" coords="594,888,465,894,489,1096,614,1093" shape="poly">
                <area nomor="B18" href="" coords="727,885,600,887,616,1093,745,1087" shape="poly">
                <area nomor="B19" href="" coords="589,560,452,568,469,775,611,770" shape="poly">
                <area nomor="B20" href="" coords="264,580,448,568,469,777,298,785" shape="poly">
            </map>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise/dist/es6-promise.auto.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imagemapster/1.5.4/jquery.imagemapster.min.js"></script>
    <script>
        const a = {{ Js::from($map) }};
        const basic_opts = {
            mapKey: "nomor",
            onClick: function(data) {
                window.location.href =
                    `${window.location.origin}/pelanggan/pemesanan-rumah/create?nomor_rumah=${data.key.substring(1)}`;
            },
            clickNavigate: true,
            showToolTip: true,
            toolTipContainer: "<div class='border rounded p-3 shadow bg-white'></div>",
            areas: []
        };

        a.forEach((element) => {
            basic_opts.areas.push({
                key: element.nomor,
                toolTip: `
                    Nomor Rumah: ${element.nomor}
                    <br>
                    Harga: ${element.harga}
                `
            })
        });



        const initial_opts = $.extend({}, basic_opts, {
            staticState: false,
            fill: false,
            stroke: false,
            strokeWidth: 2,
            strokeColor: "ff0000",
        });

        const img = $("img").mapster(initial_opts);
        a.forEach((element) => {
            if (element.status == 1) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "198754",
                });
            }
            if (element.sedang_diskon) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "0DCAF0",
                });
            }
            if (element.status == 2) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "FFC107",
                });
            }
            if (element.status == 3) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "DC3545",
                });
            }
        });

        img.mapster("snapshot").mapster("rebind", basic_opts);
    </script>
@endsection
