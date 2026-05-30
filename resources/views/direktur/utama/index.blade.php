<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Direktur Utama</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    background:
        linear-gradient(rgba(8,12,25,.76), rgba(8,12,25,.76)),
        url('/properti.png') no-repeat center center;
        background-size:cover;      /* FULL layar */
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    text-align: center;
    color: white;
    padding: 20px;
    min-height: 100vh;

    /* 🔥 GLASS EFFECT */
    background: rgba(97, 85, 85, 0.55);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    border-right: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
}

.sidebar h2 {
    font-size: 18px;
    margin-bottom: 20px;
}

.menu a {
    display: block;
    color: #cbd5e1;
    text-align: left;
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
    font-weight: bold;        /* 👈 tebal */
    text-transform: uppercase;
}

.back-btn {
    background: #334155;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    color: white;
    cursor: pointer;
}

/* SUMMARY */
.summary {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(150px,1fr)); /* 👈 dari 180 → 150 */
    gap: 10px; /* 👈 lebih rapat */
}

.summary-box {
    padding: 10px; /* 👈 lebih kecil */
    border-radius: 6px;
    color: white;
    text-align: center;
    font-weight: bold;
}

.summary-box h3 {
    margin: 0;
    font-size: 12px; /* 👈 kecilkan */
    opacity: 0.9;
}

.summary-box h2 {
    margin-top: 3px;
    font-size: 16px; /* 👈 kecilkan angka */
}

.summary-box:nth-child(1) { background: #0ea5e9; }
.summary-box:nth-child(2) { background: #22c55e; }
.summary-box:nth-child(3) { background: #f59e0b; }
.summary-box:nth-child(4) { background: #6366f1; }

/* TITLE */
h1 {
    margin-top: 25px;
    color: #1e293b;
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

/* chart biar rapi */
canvas {
    margin-top: 15px;
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
.chart-row{
    display: flex;
    gap: 20px;
    justify-content: flex-start;
}

.chart-container{
    width: 400px;   /* 👈 fix lebar */
    height: 200px;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.calendar-header h3 {
    margin: 0;
    font-size: 16px;
    color: #ffffff;
}

.calendar-header p {
    margin: 0;
    font-size: 12px;
    color: #cbd5e1;
}

/* HARI */
.calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
    font-size: 11px;
    color: #cbd5e1;
    margin-bottom: 6px;
}

/* GRID TANGGAL */
.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
}

/* TANGGAL */
.day {
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.05);
    color: #ffffff;
}

/* HOVER */
.day:hover {
    background: rgba(255, 255, 255, 0.15);
    cursor: pointer;
}

/* HARI INI */
.day.today {
    background: #4facfe;
    color: #000;
    font-weight: bold;
}

/* POSISI */
.calendar-box {
    margin-top: -10px; /* lebih balance */
}
/* ================= GLASS EFFECT UNTUK SEMUA CARD ================= */

/* CARD */
.card{
    background: rgba(255,255,255,0.08) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
    color: #ffffff;
}

/* BOX */
.box{
    background: rgba(255,255,255,0.08) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
    color: #ffffff;
}

/* CHART CONTAINER */
.chart-container{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 10px;
    padding: 10px;
    border: 1px solid rgba(255,255,255,0.1);
}

/* SUMMARY BOX */
.summary-box{
    background: rgba(255,255,255,0.08) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
}

/* CALENDAR */
.calendar-box{
    background: transparent;
    backdrop-filter: none;
    border: none;
    padding: 0;
}

/* TEXT BIAR KELIATAN */
.card h3,
.card h1,
.box h2,
.box p{
    color: #ffffff;
}
/* ================= GLASS ADVANCED ================= */
.card,
.box,
.chart-container,
.summary-box,
.calendar-box{
    position: relative;
    overflow: hidden;
}

/* 🔥 efek cahaya nyapu */
.card::before,
.box::before,
.chart-container::before,
.summary-box::before,
.calendar-box::before{
    content: "";
    position: absolute;
    top: -100%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.08),
        transparent
    );
    transform: rotate(25deg);
    transition: 0.8s;
}

/* 🔥 gerak pas hover */
.card:hover::before,
.box:hover::before,
.chart-container:hover::before,
.summary-box:hover::before,
.calendar-box:hover::before{
    top: 100%;
}

/* 🔥 depth lebih hidup */
.card:hover,
.box:hover,
.chart-container:hover{
    transform: translateY(-6px) scale(1.02);
    box-shadow: 
        0 10px 30px rgba(0,0,0,0.3),
        0 0 25px rgba(79,172,254,0.15);
}
/* ❌ matiin efek cahaya di dalam kalender */
.calendar-box::before{
    display: none !important;
}
#rain{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    pointer-events:none;
    z-index:999; 
}
/* ================= NEON RUNNING BORDER (PUTIH) ================= */

.card,
.box,
.chart-box,
.summary-box{
    position: relative;
    z-index: 1;
}

/* 🔥 layer neon */
.card::after,
.box::after,
.chart-box::after,
.summary-box::after{
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 12px;
    padding: 2px;

    /* 🔥 warna putih neon */
    background: linear-gradient(
        120deg,
        transparent 0%,
        rgba(255,255,255,0.2) 20%,
        #ffffff 40%,
        rgba(255,255,255,0.2) 60%,
        transparent 100%
    );

    background-size: 300% 300%;

    /* 🔥 lebih lambat & smooth */
    animation: borderRun 8s linear infinite;

    /* 🔥 efek glow */
    filter: blur(2px) brightness(1.6);

    /* 🔥 hanya pinggir */
    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;

    pointer-events: none;
}

/* 🔥 animasi jalan */
@keyframes borderRun{
    0%{
        background-position: 0% 50%;
    }
    100%{
        background-position: 300% 50%;
    }
}
</style>
</head>

<body>
<canvas id="rain"></canvas>
@if(!session('akses_direktur'))
<script>window.location.href="/direktur-utama";</script>
@endif

<div class="sidebar">
    <h2>MENU</h2>

    <div class="menu">
        <a href="/pemegang-direksi">📊 Pemegang Direksi</a>
        <a href="/id-perusahaan">🏢 ID Perusahaan</a>
        <a href="#">👨‍💼 Data Karyawan</a>
        <a href="/jadwal-meeting">📅 Jadwal Meeting</a>
        <a href="#">💰 Keuangan</a>
    </div>
</div>

<div class="main">

<div class="content">

    <!-- TOP -->
    <div class="topbar">
        <div>{{ session('jabatan') }}</div>
        <button class="back-btn" onclick="location.href='/dashboard'">
            ← Kembali
        </button>
    </div>

    <!-- SUMMARY -->
    <div class="summary">
        <div class="summary-box">
            <h3>Total Karyawan</h3>
            <h2>{{ $totalDireksi }}</h2>
        </div>

        <div class="summary-box">
            <h3>Laporan Masuk</h3>
            <h2>8</h2>
        </div>

        <div class="summary-box">
            <h3>Status Sistem</h3>
            <h2>Aktif</h2>
        </div>

        <div class="summary-box">
            <h3>Divisi Aktif</h3>
            <h2>5</h2>
        </div>
    </div>

    <!-- TITLE -->
    <h1 style="color:white;">Dashboard</h1>
<p style="color:white;">Ringkasan aktivitas perusahaan</p>

    <!-- CARDS -->
    <div class="cards">

    <div class="chart-row">

        <div class="chart-container">
            <canvas id="barChart"></canvas>
        </div>

        <div class="chart-container">
            <canvas id="lineChart"></canvas>
        </div>

        <!-- 🔥 KALENDER -->
        <div class="chart-container">
            <div class="calendar-box">
                <div class="calendar-header">
                    <h3 style="color:white;">Kalender</h3>
                    <p id="monthYear"></p>
                </div>

                <div class="calendar-grid" id="calendarGrid"></div>
            </div>
        </div>

    </div>

</div>

    </div>

    <!-- BOX -->
    <div class="box">
        <h2>Ringkasan Perusahaan</h2>
        <p>
            Panel ini digunakan untuk memonitor seluruh aktivitas perusahaan secara real-time.
            Anda dapat mengevaluasi kinerja divisi, melihat laporan, serta mengambil keputusan strategis.
        </p>
    </div>

</div>
</div>

<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'],
        datasets: [
            {
                label: 'Pemasaran',
                data: [90,70,60,80,50,65,75],
                backgroundColor: '#4facfe',
                barThickness: 25
            },
            {
                label: 'Volume',
                data: [60,50,40,70,30,55,60],
                backgroundColor: '#00f2fe',
                barThickness: 25
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                labels: {
                    color: '#ffffff'   // 🔥 legend putih
                }
            }
        },
        scales: {
            x: {
                stacked: false,
                ticks: {
                    color: '#ffffff'   // 🔥 label bawah putih
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#ffffff'   // 🔥 angka kiri putih
                }
            }
        }
    }
});
</script>


<script>
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets: [
            {
                label: 'Laba Bersih',
                data: [12, 19, 10, 15, 22, 18],
                borderColor: '#22c55e',
                backgroundColor: 'transparent',
                tension: 0.4
            },
            {
                label: 'Laba Kotor',
                data: [20, 25, 18, 23, 30, 28],
                borderColor: '#3b82f6',
                backgroundColor: 'transparent',
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                labels: {
                    color: '#ffffff'   // 🔥 legend putih
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: '#ffffff'   // (optional kalau mau label bulan putih juga)
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#ffffff'
                }
            }
        }
    }
});
</script>

<script>
function generateCalendar() {
    const grid = document.getElementById("calendarGrid");
    const monthYear = document.getElementById("monthYear");

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth();

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const monthNames = [
        "Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember"
    ];

    monthYear.innerText = monthNames[month] + " " + year;

    grid.innerHTML = "";

    // kosongkan offset hari pertama
    for (let i = 0; i < firstDay; i++) {
        grid.innerHTML += `<div></div>`;
    }

    // isi tanggal
    for (let day = 1; day <= daysInMonth; day++) {
        let isToday = (day === now.getDate());

        grid.innerHTML += `
            <div class="day ${isToday ? 'today' : ''}">
                ${day}
            </div>
        `;
    }
}

generateCalendar();
</script>
<script>
const canvas = document.getElementById('rain');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// ================= HUJAN =================
let drops = [];

for(let i = 0; i < 200; i++){
    drops.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        length: Math.random() * 20 + 10,
        speed: Math.random() * 5 + 5
    });
}

// ================= DRAW =================
function draw(){

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // HUJAN
    ctx.strokeStyle = 'rgba(174,194,224,0.5)';
    ctx.lineWidth = 1;

    drops.forEach(d => {

        ctx.beginPath();
        ctx.moveTo(d.x, d.y);
        ctx.lineTo(d.x, d.y + d.length);
        ctx.stroke();

        d.y += d.speed;

        if(d.y > canvas.height){
            d.y = -20;
            d.x = Math.random() * canvas.width;
        }

    });

    requestAnimationFrame(draw);
}

draw();

// RESPONSIVE
window.addEventListener('resize', () => {

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

});
</script>
</body>
</html>