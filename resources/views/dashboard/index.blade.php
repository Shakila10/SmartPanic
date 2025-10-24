<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Badge notifikasi realtime -->
      <div id="notif-area" class="mb-4"></div>

      <div class="bg-white shadow-sm sm:rounded-lg p-6">
        <h3 class="mb-4">Grafik Laporan per Jenis</h3>
        <canvas id="laporanChart" width="400" height="200"></canvas>
      </div>

      <div class="bg-white shadow-sm sm:rounded-lg p-6 mt-6">
        <h3 class="mb-4">Laporan Terbaru</h3>
        <table class="w-full table-auto">
          <thead>
            <tr class="text-left">
              <th>Nama</th><th>Jenis</th><th>Lokasi</th><th>Status</th><th>Waktu</th>
            </tr>
          </thead>
          <tbody>
            @foreach($laporans ?? \App\Models\Laporan::latest()->take(10)->get() as $l)
              <tr>
                <td>{{ $l->nama_pelapor ?? 'Anonim' }}</td>
                <td>{{ $l->jenis }}</td>
                <td>{{ $l->lokasi }}</td>
                <td>{{ $l->status }}</td>
                <td>{{ $l->created_at->diffForHumans() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://js.pusher.com/8.0/pusher.min.js"></script>
    <script src="{{ asset('js/echo.js') }}"></script> <!-- jika kamu compile echo -->
    <script>
      // Chart.js fetch data
      async function loadChart(){
        const res = await fetch("{{ route('chart.data') }}");
        const data = await res.json();
        const labels = Object.keys(data);
        const values = Object.values(data);

        const ctx = document.getElementById('laporanChart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: labels,
            datasets: [{ data: values }]
          }
        });
      }
      loadChart();

      // Pusher/Echo realtime listener
      // Pastikan .env di-set: PUSHER_APP_KEY, PUSHER_APP_CLUSTER, etc.
      Pusher.logToConsole = false;

      const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
        // jika pake local websockets, set host/port accordingly
        // wsHost, wsPort, enabledTransports...
      });

      const channel = pusher.subscribe('laporan-channel');
      channel.bind('App\\Events\\LaporanCreated', function(data) {
        // tampilkan notifikasi sederhana
        const area = document.getElementById('notif-area');
        const node = document.createElement('div');
        node.className = 'p-3 mb-2 bg-yellow-100 border-l-4 border-yellow-500';
        node.innerHTML = `<strong>Laporan Baru:</strong> ${data.jenis} — ${data.nama_pelapor ?? 'Anonim'} di ${data.lokasi} `;
        area.prepend(node);
        // reload chart
        loadChart();
      });
    </script>
  @endpush
</x-app-layout>
