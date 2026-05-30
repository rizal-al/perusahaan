<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Direktur Keuangan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    background:
        linear-gradient(rgba(8,12,25,.92), rgba(8,12,25,.94)),
        url('/properti.png') center/cover no-repeat;
    color:white;
}

/* SIDEBAR */
.sidebar{
    width:270px;
    background:rgba(15,23,42,.92);
    border-right:1px solid rgba(255,255,255,.06);
    padding:28px 22px;
    backdrop-filter:blur(18px);
}

.logo{
    font-size:24px;
    font-weight:700;
    margin-bottom:35px;
    letter-spacing:1px;
}

.logo span{
    color:#38bdf8;
}

.menu-title{
    font-size:13px;
    color:#94a3b8;
    margin-bottom:14px;
    text-transform:uppercase;
    letter-spacing:1px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;

    text-decoration:none;
    color:#e2e8f0;

    padding:14px 16px;
    border-radius:14px;

    margin-bottom:10px;

    transition:.25s ease;
}

.menu a:hover{
    background:rgba(255,255,255,.08);
    transform:translateX(4px);
}

/* MAIN */
.main{
    flex:1;
    padding:28px;
}

/* TOPBAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:28px;

    padding:18px 24px;

    border-radius:22px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(16px);
}

.user-info h3{
    font-size:18px;
    margin-bottom:4px;
}

.user-info p{
    color:#94a3b8;
    font-size:13px;
}

.back-btn{
    text-decoration:none;
    color:white;

    background:linear-gradient(90deg,#2563eb,#06b6d4);

    padding:12px 22px;

    border-radius:12px;

    font-size:14px;
    font-weight:600;

    transition:.25s;
}

.back-btn:hover{
    transform:translateY(-2px);
}

/* TITLE */
.page-title{
    margin-bottom:26px;
}

.page-title h1{
    font-size:38px;
    margin-bottom:8px;

    background:linear-gradient(90deg,#fff,#7dd3fc);

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.page-title p{
    color:#94a3b8;
    font-size:15px;
}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:22px;
    margin-bottom:24px;
}

.card{
    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    padding:24px;

    backdrop-filter:blur(16px);

    transition:.25s ease;

    box-shadow:
        0 10px 30px rgba(0,0,0,.25);
}

.card:hover{
    transform:translateY(-4px);
}

.card h3{
    color:#94a3b8;
    font-size:14px;
    font-weight:500;
    margin-bottom:12px;
}

.card h1{
    font-size:32px;
    color:#fff;
}

/* BOX */
.box{
    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    padding:28px;

    backdrop-filter:blur(16px);

    box-shadow:
        0 10px 30px rgba(0,0,0,.25);
}

.box h2{
    margin-bottom:14px;
    font-size:22px;
}

.box p{
    color:#cbd5e1;
    line-height:1.8;
    font-size:15px;
}

/* RESPONSIVE */
@media(max-width:900px){

    body{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
        border-right:none;
        border-bottom:1px solid rgba(255,255,255,.06);
    }

}

@media(max-width:768px){

    .main{
        padding:18px;
    }

    .topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:16px;
    }

    .back-btn{
        width:100%;
        text-align:center;
    }

    .page-title h1{
        font-size:30px;
    }

}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        F.<span>Tecnology</span>
    </div>

    <div class="menu-title">
        Menu Keuangan
    </div>

    <div class="menu">
        <a href="#">💰 Data Keuangan</a>
        <a href="#">📊 Laporan</a>
        <a href="#">📈 Statistik</a>
        <a href="/logout">🚪 Logout</a>
    </div>

</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="user-info">
            <h3>
                {{ $user->jabatan ?? 'Direktur Keuangan' }}
            </h3>

            <p>
                Sistem Monitoring Keuangan Perusahaan
            </p>
        </div>

        <a href="/dashboard" class="back-btn">
            ← Kembali
        </a>

    </div>

    <!-- TITLE -->
    <div class="page-title">

        <h1>
            Dashboard Keuangan
        </h1>

        <p>
            Pantau kondisi finansial perusahaan secara real-time dan terstruktur.
        </p>

    </div>

    <!-- CARDS -->
    <div class="cards">

        <div class="card">
            <h3>Total Pemasukan</h3>
            <h1>
                Rp {{ number_format(0,0,',','.') }}
            </h1>
        </div>

        <div class="card">
            <h3>Total Pengeluaran</h3>
            <h1>
                Rp {{ number_format(0,0,',','.') }}
            </h1>
        </div>

        <div class="card">
            <h3>Saldo Perusahaan</h3>
            <h1>
                Rp {{ number_format(0,0,',','.') }}
            </h1>
        </div>

    </div>

    <!-- BOX -->
    <div class="box">

        <h2>
            Ringkasan Keuangan
        </h2>

        <p>
            Panel ini digunakan untuk memonitor seluruh aktivitas keuangan perusahaan.
            Anda dapat melihat pemasukan, pengeluaran, laporan keuangan, dan melakukan
            analisis kondisi finansial perusahaan secara lebih profesional dan real-time.
        </p>

    </div>

</div>

</body>
</html>