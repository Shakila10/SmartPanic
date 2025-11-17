<header class="top-header">
    <div class="header-left">
        <img src="{{ asset('images/LogoCreamSmartPanic.png') }}" alt="Logo Smart Panic">
        <h1>SMART PANIC</h1>
    </div>
   <div class="header-center"><h3>Dashboard Warga</h3></div>
    <div class="header-right">
        <div class="profile">
    @if(Auth::user()->photo)
        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile" class="profile-img">
    @else
        <span class="material-icons-outlined">person</span>
    @endif
    </div>
    </div>
</header>

<script>
    document.querySelector('.profile').addEventListener('click', () => {
        window.location.href = "{{ route('dashboardWarga.profile') }}";
    });
</script>

<style>
    .profile img.profile-img {
    width: 40px;   
    height: 40px;
    border-radius: 50%;
    object-fit: cover;  
    }
</style>