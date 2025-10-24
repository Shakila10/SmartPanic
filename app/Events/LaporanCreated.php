<?php

namespace App\Events;

use App\Models\Laporan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class LaporanCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public Laporan $laporan;

    public function __construct(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function broadcastOn()
    {
        // channel publik untuk admin dashboard
        return new Channel('laporan-channel');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->laporan->id,
            'jenis' => $this->laporan->jenis,
            'nama_pelapor' => $this->laporan->nama_pelapor,
            'lokasi' => $this->laporan->lokasi,
            'created_at' => $this->laporan->created_at->toDateTimeString(),
        ];
    }
}
