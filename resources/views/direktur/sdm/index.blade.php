<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Direktur SDM</title>
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
    padding: 20px;
    color: white;
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
    color: white;
}

/* MAIN */
.main {
    flex: 1;
    padding: 20px;
}

/* TOPBAR */
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.user {
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

/* SUCCESS */
.success {
    color: #16a34a;
    background: #dcfce7;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 10px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Direktur SDM</h2>

    <div class="menu">
        <a href="#">👨‍💼 Data Karyawan</a>
        <a href="#">📊 Manajemen Jabatan</a>
        <a href="#">📅 Absensi</a>
        <a href="#">💰 Penggajian</a>
        <a href="/logout">🚪 Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <div class="content">

        <!-- TOP -->
        <div class="topbar">
            <div class="user">
                {{ session('jabatan') ?? 'Direktur SDM' }}
            </div>
            <a href="/dashboard" class="back">← Kembali</a>
        </div>

        <!-- TITLE -->
        <h1>Dashboard SDM</h1>
        <p>Ringkasan manajemen sumber daya manusia</p>

        <!-- CARD -->
        <div class="cards">
            <div class="card">
                <h3>Total Karyawan</h3>
                <h1>0</h1>
            </div>

            <div class="card">
                <h3>Absensi Hari Ini</h3>
                <h1>0</h1>
            </div>
        </div>

        <!-- BOX -->
        <div class="box">
            <h2>Ringkasan SDM</h2>

            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            <p>
                Panel ini digunakan untuk mengelola seluruh data karyawan,
                absensi, serta penggajian. Direktur SDM dapat memonitor
                kinerja dan pengelolaan SDM secara real-time.
            </p>
        </div>

    </div>
</div>

</body>
</html>