<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Direktur Pemasaran</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    min-height: 100vh;
    background: #f1f5f9;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background: #1e293b;
    color: white;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 25px;
    font-size: 18px;
}

.menu a {
    display: block;
    color: #cbd5e1;
    text-decoration: none;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 5px;
    transition: 0.2s;
}

.menu a:hover {
    background: #334155;
}

/* MAIN */
.main {
    flex: 1;
    padding: 20px;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.user-info {
    font-size: 14px;
    color: #334155;
}

.back {
    background: #334155;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
}

/* TITLE */
h1 {
    margin: 10px 0 5px;
    font-size: 28px;
    color: #1e293b;
}

p {
    color: #64748b;
}

/* CARDS */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    gap: 20px;
    margin-top: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    color: #1e293b;
}

.card h3 {
    margin: 0;
    font-size: 14px;
    opacity: 0.7;
}

.card h1 {
    margin-top: 10px;
}

/* BOX */
.box {
    margin-top: 20px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    color: #1e293b;
}

/* RESPONSIVE */
@media(max-width:900px){
    body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }
}
</style>
</head>

<body>

{{-- 🔒 PROTEK --}}
@if(!session('akses_pemasaran'))
<script>window.location.href="/direktur-pemasaran";</script>
@endif

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Direktur Pemasaran</h2>

    <div class="menu">
        <a href="#">📢 Strategi Marketing</a>
        <a href="#">📊 Analisis Pasar</a>
        <a href="#">📈 Kampanye</a>
        <a href="/logout">🚪 Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <div class="content">

        <!-- HEADER -->
        <div class="header">
            <div>
                <div class="user-info">
                    {{ $user->jabatan ?? 'Direktur Pemasaran' }}
                </div>

            </div>

            <a href="/dashboard" class="back">← Kembali</a>
        </div>
        <h1>Dashboard Pemasaran</h1>
                <p>Ringkasan aktivitas pemasaran</p>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <h3>Total Kampanye</h3>
                <h1>0</h1>
            </div>

            <div class="card">
                <h3>Kampanye Aktif</h3>
                <h1>0</h1>
            </div>

            <div class="card">
                <h3>Reach Audience</h3>
                <h1>0</h1>
            </div>
        </div>

        <!-- BOX -->
        <div class="box">
            <h2>Ringkasan Pemasaran</h2>
            <p>
                Panel ini digunakan untuk memonitor seluruh aktivitas pemasaran perusahaan.
                Direktur Pemasaran dapat menganalisis pasar, mengelola kampanye,
                serta meningkatkan strategi branding secara real-time.
            </p>
        </div>

    </div>
</div>

</body>
</html>