<?php

namespace App\Console;

use App\Models\PendaftaranPemesanan;
use App\Models\Rumah;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $today = Carbon::now('Asia/Kuala_Lumpur')->toDateString();
            $pendaftaranPemesanan = PendaftaranPemesanan::where('tanggal_beli', '<', $today);
            $pendaftaranPemesanan->update(['status' => 2]);
            $pendaftaranPemesanan->each(
                function ($item) {
                    Rumah::find($item->rumahPelanggan->rumah->id)->update(['status_ketersediaan' => 1]);
                }
            );
        })
            ->timezone('Asia/Kuala_Lumpur')
            ->everyMinute();
        // ->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
