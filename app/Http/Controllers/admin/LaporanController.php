<?php

namespace App\Http\Controllers\admin;

use App\Charts\PenjualanRumahChart;
use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\KeluhanPelanggan;
use App\Models\Pembayaran;
use App\Models\PembayaranUangMuka;
use App\Models\PendaftaranPemesanan;
use App\Models\Promo;
use App\Models\RiwayatPembangunanRumah;
use App\Models\Rumah;
use App\Models\RumahPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function rumah()
    {
        $query = Rumah::select("*");
        $href = "/admin/cetak/rumah?";

        if (request()->get('id_blok_perumahan')) {
            $query = $query->where('id_blok_perumahan', request()->get('id_blok_perumahan'));
            $href .= "&id_blok_perumahan=" . request()->get('id_blok_perumahan');
        }

        if (request()->get('status_ketersediaan')) {
            $query = $query->where('status_ketersediaan', request()->get('status_ketersediaan'));
            $href .= "&status_ketersediaan=" . request()->get('status_ketersediaan');
        }

        if (request()->get('status_pembangunan')) {
            $query = $query->where('status_pembangunan', request()->get('status_pembangunan'));
            $href .= "&status_pembangunan=" . request()->get('status_pembangunan');
        }

        $rumah = $query->get();

        return view('dashboard.admin.halaman.laporan.rumah', [
            'blok' => BlokPerumahan::orderBy('urutan')->get(),
            'rumah' => $rumah,
            'href' => $href
        ]);
    }

    public function penjualanRumah()
    {
        $query = PembayaranUangMuka::orderBy('created_at', 'DESC');
        $href = "/admin/cetak/penjualan-rumah?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $query = $query->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        if (request()->get('id_blok_perumahan')) {
            $query = $query->whereHas('rumahPelanggan', function ($q) {
                $q->whereHas('rumah', function ($q) {
                    $q->where('id_blok_perumahan', request()->get('id_blok_perumahan'));
                });
            });
            $href .= "&id_blok_perumahan=" . request()->get('id_blok_perumahan');
        }

        $penjualan_rumah = $query->get()->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });

        return view('dashboard.admin.halaman.laporan.penjualan_rumah', [
            'blok' => BlokPerumahan::orderBy('urutan')->get(),
            'penjualan_rumah' => $penjualan_rumah,
            'href' => $href
        ]);
    }

    public function pemesananRumah()
    {
        $query = PendaftaranPemesanan::orderBy('created_at', 'DESC');
        $href = "/admin/cetak/pemesanan-rumah?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $query = $query->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        if (request()->get('id_blok_perumahan')) {
            $query = $query->whereHas('rumahPelanggan', function ($q) {
                $q->whereHas('rumah', function ($q) {
                    $q->where('id_blok_perumahan', request()->get('id_blok_perumahan'));
                });
            });
            $href .= "&id_blok_perumahan=" . request()->get('id_blok_perumahan');
        }

        $pemesanan_rumah = $query->get()->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });

        return view('dashboard.admin.halaman.laporan.pemesanan_rumah', [
            'blok' => BlokPerumahan::orderBy('urutan')->get(),
            'pemesanan_rumah' => $pemesanan_rumah,
            'href' => $href
        ]);
    }

    public function keluhanPelanggan()
    {
        $query = KeluhanPelanggan::orderBy('tanggal', 'DESC');
        $href = "/admin/cetak/keluhan-pelanggan?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $query = $query->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        $keluhan_pelanggan = $query->get()->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });


        return view('dashboard.admin.halaman.laporan.keluhan_pelanggan', [
            'keluhan_pelanggan' => $keluhan_pelanggan,
            'href' => $href
        ]);
    }

    public function progresPembangunanRumah()
    {
        $query = RiwayatPembangunanRumah::orderBy('created_at', 'DESC');
        $href = "/admin/cetak/progres-pembangunan-rumah?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $query = $query->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        if (request()->get('id_blok_perumahan')) {
            $query = $query->whereHas('rumah', function ($q) {
                $q->where('id_blok_perumahan', request()->get('id_blok_perumahan'));
            });
            $href .= "&id_blok_perumahan=" . request()->get('id_blok_perumahan');
        }

        $progres_pembangunan_rumah = $query->get()->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });


        return view('dashboard.admin.halaman.laporan.progres_pembangunan_rumah', [
            'blok' => BlokPerumahan::orderBy('urutan')->get(),
            'progres_pembangunan_rumah' => $progres_pembangunan_rumah,
            'href' => $href
        ]);
    }

    public function promo()
    {
        $query = Promo::orderBy('tanggal_mulai', 'DESC');
        $href = "/admin/cetak/promo?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $query = $query->where(function ($q) {
                $q->where('tanggal_mulai', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal_mulai', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        $promo = $query->get()->map(function ($item) {
            $tanggal_mulai = new Carbon($item->tanggal_mulai);
            $item->tanggal_mulai = $tanggal_mulai->day . ' ' . $tanggal_mulai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_mulai->year;

            $tanggal_selesai = new Carbon($item->tanggal_selesai);
            $item->tanggal_selesai = $tanggal_selesai->day . ' ' . $tanggal_selesai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_selesai->year;

            return $item;
        });


        return view('dashboard.admin.halaman.laporan.promo', [
            'promo' => $promo,
            'href' => $href
        ]);
    }

    public function grafikPenjualan()
    {
        if (request()->get('kuartal') && request()->get('tahun')) {
            $chart = new PenjualanRumahChart;
            $query = PembayaranUangMuka::whereYear('tanggal', request()->get('tahun'))->orderBy('tanggal');

            if (request()->get('kuartal') == 1) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 1)->whereMonth('tanggal', '<=', 3);
                });
                $chart->labels(['Januari', 'Februari', 'Maret']);
            }

            if (request()->get('kuartal') == 2) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 4)->whereMonth('tanggal', '<=', 6);
                });
                $chart->labels(['April', 'Mei', 'Juni']);
            }

            if (request()->get('kuartal') == 3) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 7)->whereMonth('tanggal', '<=', 9);
                });
                $chart->labels(['Juli', 'Agustus', 'September']);
            }

            if (request()->get('kuartal') == 4) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 10)->whereMonth('tanggal', '<=', 12);
                });
                $chart->labels(['Oktober', 'November', 'Desember']);
            }

            $href = "/admin/cetak/grafik-penjualan?kuartal=" . request()->get('kuartal') . "&tahun=" . request()->get('tahun');

            $dataset = [0, 0, 0];
            foreach ($query->get() as $value) {
                if (in_array(explode('-', $value['tanggal'])[1], [1, 4, 7, 10]))
                    $dataset[0]++;

                if (in_array(explode('-', $value['tanggal'])[1], [2, 5, 8, 11]))
                    $dataset[1]++;

                if (in_array(explode('-', $value['tanggal'])[1], [3, 6, 9, 12]))
                    $dataset[2]++;
            }

            $chart->dataset('Penjualan', 'bar', $dataset)->options([
                'backgroundColor' => '#204A40',
            ]);
            $chart->setStepSize(max($dataset), 8);
            $chart->displayLegend(true);
            $chart->title("Grafik Penjualan Rumah", 24, "#000");


            return view('dashboard.admin.halaman.laporan.grafik_penjualan', [
                'chart' => $chart,
                'href' => $href
            ]);
        }

        return view('dashboard.admin.halaman.laporan.grafik_penjualan');
    }

    public function grafikPemesanan()
    {
        if (request()->get('kuartal') && request()->get('tahun')) {
            $chart = new PenjualanRumahChart;
            $query = PendaftaranPemesanan::whereYear('tanggal', request()->get('tahun'))->orderBy('tanggal');

            if (request()->get('kuartal') == 1) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 1)->whereMonth('tanggal', '<=', 3);
                });
                $chart->labels(['Januari', 'Februari', 'Maret']);
            }

            if (request()->get('kuartal') == 2) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 4)->whereMonth('tanggal', '<=', 6);
                });
                $chart->labels(['April', 'Mei', 'Juni']);
            }

            if (request()->get('kuartal') == 3) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 7)->whereMonth('tanggal', '<=', 9);
                });
                $chart->labels(['Juli', 'Agustus', 'September']);
            }

            if (request()->get('kuartal') == 4) {
                $query->where(function ($q) {
                    $q->whereMonth('tanggal', '>=', 10)->whereMonth('tanggal', '<=', 12);
                });
                $chart->labels(['Oktober', 'November', 'Desember']);
            }

            $href = "/admin/cetak/grafik-pemesanan?kuartal=" . request()->get('kuartal') . "&tahun=" . request()->get('tahun');

            $dataset = [0, 0, 0];
            foreach ($query->get() as $value) {
                if (in_array(explode('-', $value['tanggal'])[1], [1, 4, 7, 10]))
                    $dataset[0]++;

                if (in_array(explode('-', $value['tanggal'])[1], [2, 5, 8, 11]))
                    $dataset[1]++;

                if (in_array(explode('-', $value['tanggal'])[1], [3, 6, 9, 12]))
                    $dataset[2]++;
            }

            $chart->dataset('Pemesanan', 'bar', $dataset)->options([
                'backgroundColor' => '#204A40',
            ]);
            $chart->setStepSize(max($dataset), 8);
            $chart->displayLegend(true);
            $chart->title("Grafik Pemesanan Rumah", 24, "#000");

            return view('dashboard.admin.halaman.laporan.grafik_pemesanan', [
                'chart' => $chart,
                'href' => $href
            ]);
        }

        return view('dashboard.admin.halaman.laporan.grafik_pemesanan');
    }

    public function keuanganPembayaranRumah()
    {
        $pembayaranUangMuka = PembayaranUangMuka::orderBy('created_at', 'DESC');
        $pendaftaranPemesanan = PendaftaranPemesanan::orderBy('created_at', 'DESC');
        $pembayaran = Pembayaran::where('status', 3)->orderBy('created_at', 'DESC');
        $href = "/admin/cetak/keuangan-pembayaran-rumah?";

        if (!empty(request()->get('dari_tanggal')) && !empty(request()->get('sampai_tanggal'))) {
            $pembayaranUangMuka = $pembayaranUangMuka->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $pendaftaranPemesanan = $pendaftaranPemesanan->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $pembayaran = $pembayaran->where(function ($q) {
                $q->where('tanggal', '>=', request()->get('dari_tanggal'))
                    ->where('tanggal', '<=', request()->get('sampai_tanggal'));
            });
            $href .= "&dari_tanggal=" . request()->get('dari_tanggal') . '&sampai_tanggal=' . request()->get('sampai_tanggal');
        }

        $keuanganPembayaranRumah = collect();
        $keuanganPembayaranRumah = $keuanganPembayaranRumah->merge($pembayaranUangMuka->get());
        $keuanganPembayaranRumah = $keuanganPembayaranRumah->merge($pendaftaranPemesanan->get());
        $keuanganPembayaranRumah = $keuanganPembayaranRumah->merge($pembayaran->get());

        $keuanganPembayaranRumah = $keuanganPembayaranRumah->map(function ($item) {
            $data = [
                'tanggal'       => $item->tanggal(),
                'nama_blok'     => $item->rumahPelanggan->rumah->blokPerumahan->nama,
                'nomor_rumah'   => $item->rumahPelanggan->rumah->nomor_rumah,
                'nominal'       => $item->nominal
            ];

            if (get_class($item) == get_class(new PembayaranUangMuka)) {
                if ($item->rumahPelanggan->jenis_pembayaran == 1) {
                    $data['jenis_pembayaran']   = "Tunai";
                    $data['nominal']            = $item->rumahPelanggan->harga_penjualan;
                } else
                    $data['jenis_pembayaran']   = "Uang Muka";
            }

            if (get_class($item) == get_class(new PendaftaranPemesanan))
                $data['jenis_pembayaran'] = "Pemesanan";

            if (get_class($item) == get_class(new Pembayaran))
                $data['jenis_pembayaran'] = "Tunai Berkala";

            return $data;
        });

        return view('dashboard.admin.halaman.laporan.keuangan_pembayaran_rumah', [
            'keuanganPembayaranRumah' => $keuanganPembayaranRumah,
            'href' => $href
        ]);
    }

    public function rekapTagihanPembayaranRumah()
    {
        $rumah = RumahPelanggan::where('jenis_pembayaran', 2)
            ->orWhere('jenis_pembayaran', 1)
            ->get()
            ->map(function ($item) {
                return $item->rumah;
            })->sortBy('nomor_rumah');
        $rumahPelanggan = RumahPelanggan::where('jenis_pembayaran', 2)
            ->orWhere('jenis_pembayaran', 1);
        $href = "/admin/cetak/rekap-tagihan-pembayaran-rumah?";

        if (!empty(request()->get('id_rumah'))) {
            $rumahPelanggan = $rumahPelanggan->whereHas('rumah', function ($q) {
                $q->where('id', request()->get('id_rumah'));
            })->first();

            if ($rumahPelanggan->jenis_pembayaran == 1) {
                $pembayaran = [
                    [
                        'tanggal' => $rumahPelanggan->pembayaranUangMuka->tanggal(),
                        'tanggal_date_string' => $rumahPelanggan->pembayaranUangMuka->tanggal,
                        'nominal' => $rumahPelanggan->harga_penjualan,
                        'status' => '3'
                    ]
                ];
            }

            if ($rumahPelanggan->jenis_pembayaran == 2) {
                $pembayaran = $rumahPelanggan->pembayaran->map(function ($item) {
                    return [
                        'tanggal' => $item->tanggal(),
                        'tanggal_date_string' => $item->tanggal,
                        'nominal' => $item->nominal,
                        'status' => $item->status
                    ];
                });
            }

            $href .= "id_rumah=" . request()->get('id_rumah');
        } else
            $pembayaran = collect();

        return view('dashboard.admin.halaman.laporan.rekap_tagihan_pembayaran_rumah', [
            'hari_ini'      => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'rumah'         => $rumah,
            'pembayaran'    => $pembayaran,
            'href'          => $href
        ]);
    }
}
