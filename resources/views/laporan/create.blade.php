<x-guest-layout>
  <div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl mb-4">Laporkan Kejadian Darurat</h1>
    <form action="{{ route('laporan.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Nama (opsional)</label>
        <input name="nama_pelapor" class="w-full border p-2" />
      </div>
      <div class="mb-3">
        <label>Jenis Insiden</label>
        <select name="jenis" class="w-full border p-2">
          <option>Medis</option>
          <option>Kebakaran</option>
          <option>Kriminal</option>
          <option>Lainnya</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Lokasi</label>
        <input name="lokasi" class="w-full border p-2" />
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="w-full border p-2"></textarea>
      </div>
      <button class="px-4 py-2 bg-red-600 text-white rounded">Kirim Laporan</button>
    </form>
  </div>
</x-guest-layout>
