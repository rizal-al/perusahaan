<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard ERP Direksi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* ================= RESET ================= */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

html{
    scroll-behavior:smooth;
}

/* ================= BODY ================= */
body{
    min-height:100vh;
    display:flex;
    color:#fff;

    background:
        linear-gradient(rgba(5,10,20,.82), rgba(5,10,20,.84)),
        url('/properti.png') no-repeat center center;

    background-size:cover;
    overflow-x:hidden;

    opacity:0;
    transform:scale(1.04);
    transition:1s ease;
}

body.show{
    opacity:1;
    transform:scale(1);
}

/* ================= RAIN ================= */
#rain{
    position:fixed;
    inset:0;
    width:100%;
    height:100%;
    pointer-events:none;
    z-index:1;
}

/* ================= SIDEBAR ================= */
.sidebar{
    width:320px;
    padding:22px;
    position:relative;
    z-index:10;

    background:rgba(255,255,255,.05);
    backdrop-filter:blur(22px);

    border-right:1px solid rgba(255,255,255,.08);

    box-shadow:
        0 0 30px rgba(0,0,0,.25);
}

/* LOGO */
.logo-area{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:28px;
    padding-bottom:20px;

    border-bottom:1px solid rgba(255,255,255,.08);
}

.logo{
    width:52px;
    height:52px;
    border-radius:16px;

    background:
        linear-gradient(135deg,#4facfe,#00f2fe);

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:800;
    font-size:18px;

    box-shadow:
        0 0 30px rgba(79,172,254,.45);
}

.logo-text h2{
    font-size:18px;
    letter-spacing:2px;
}

.logo-text p{
    font-size:12px;
    opacity:.7;
    margin-top:4px;
}

/* TITLE */
.menu-title{
    margin-bottom:18px;
    font-size:14px;
    letter-spacing:3px;
    opacity:.75;
    font-weight:700;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:14px;
}

/* ================= CARD ================= */
.card{
    position:relative;

    padding:18px 14px;

    border-radius:22px;

    background:rgba(255,255,255,.07);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    overflow:hidden;

    transition:.35s ease;

    opacity:0;
    transform:translateY(35px);
}

body.show .card{
    opacity:1;
    transform:translateY(0);
}

.card:nth-child(1){transition-delay:.1s;}
.card:nth-child(2){transition-delay:.2s;}
.card:nth-child(3){transition-delay:.3s;}
.card:nth-child(4){transition-delay:.4s;}
.card:nth-child(5){transition-delay:.5s;}

.card:hover{
    transform:translateY(-8px) scale(1.03);

    box-shadow:
        0 20px 35px rgba(0,0,0,.35);
}

/* BORDER RUN */
.card::after,
.chart-box::after{
    content:'';
    position:absolute;
    inset:0;
    border-radius:22px;
    padding:1.4px;

    background:linear-gradient(
        130deg,
        transparent,
        rgba(255,255,255,.15),
        rgba(255,255,255,.9),
        rgba(255,255,255,.15),
        transparent
    );

    background-size:300% 300%;

    animation:borderRun 8s linear infinite;

    filter:blur(1px);

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);

    -webkit-mask-composite:xor;
    mask-composite:exclude;

    pointer-events:none;
}

@keyframes borderRun{
    0%{
        background-position:0% 50%;
    }
    100%{
        background-position:300% 50%;
    }
}

/* ================= ICON ================= */
.icon{
    position:relative;

    width:78px;
    height:78px;

    margin:0 auto 16px;

    border-radius:24px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#fff;

    font-size:24px;
    font-weight:800;

    overflow:visible;
}

.icon span{
    position:relative;
    z-index:2;
}

/* GLOW */
.icon::before{
    content:'';
    position:absolute;
    inset:-12px;

    border-radius:32px;

    background:inherit;

    filter:blur(28px);

    opacity:.9;

    z-index:1;
}

/* COLORS */
.purple{
    background:linear-gradient(135deg,#7c3aed,#a855f7);
}

.green{
    background:linear-gradient(135deg,#059669,#10b981);
}

.blue{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
}

.orange{
    background:linear-gradient(135deg,#ea580c,#f97316);
}

.red{
    background:linear-gradient(135deg,#dc2626,#ef4444);
}

/* CARD TEXT */
.card h3{
    text-align:center;
    font-size:13px;
    line-height:1.5;
    margin-bottom:14px;
}

/* BUTTON */
.card button{
    width:100%;

    padding:10px;

    border:none;
    border-radius:12px;

    background:
        linear-gradient(90deg,#4facfe,#00f2fe);

    color:#fff;

    font-size:12px;
    font-weight:700;

    cursor:pointer;

    transition:.25s ease;
}

.card button:hover{
    transform:translateY(-2px);

    box-shadow:
        0 10px 20px rgba(79,172,254,.45);
}

/* ================= CONTENT ================= */
.content{
    flex:1;
    padding:34px;
    position:relative;
    z-index:10;
}

/* ================= TOPBAR ================= */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:34px;

    padding-bottom:20px;

    border-bottom:1px solid rgba(255,255,255,.14);
}

.topbar h2{
    font-size:32px;
    margin-bottom:4px;
}

.topbar p{
    font-size:14px;
    opacity:.75;
}
/* RIGHT AREA */
.topbar-right{
    display:flex;
    flex-direction:column; /* 🔥 numpuk vertikal */
    align-items:flex-end;
    gap:12px;

    padding-right:10px;
}
.topbar-right form{
    width:100%;
}

.topbar-right .logout{
    width:100%;
}
/* LOGOUT */
.logout{
    padding:12px 20px;

    border:none;
    border-radius:14px;

    background:
        linear-gradient(135deg,#ff4d6d,#ff6b6b);

    color:#fff;

    font-weight:700;

    cursor:pointer;

    transition:.25s ease;
}

.logout:hover{
    transform:translateY(-2px);

    box-shadow:
        0 12px 25px rgba(255,80,80,.35);
}

/* ================= HEADER ================= */
.header{
    text-align:center;
    margin-bottom:34px;
}

.header h1{
    font-size:54px;
    font-weight:800;

    background:
        linear-gradient(90deg,#ffffff,#8be9ff);

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;

    margin-bottom:10px;
}

.header p{
    opacity:.7;
    font-size:15px;
}

/* ================= CHART GRID ================= */
.charts{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:22px;
}

/* BOX */
.chart-box{
    position:relative;

    padding:22px;

    border-radius:24px;

    background:rgba(255,255,255,.06);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.08);

    overflow:hidden;

    min-height:260px;

    transition:.35s ease;

    opacity:0;
    transform:translateY(30px);
}

body.show .chart-box{
    opacity:1;
    transform:translateY(0);
}

.chart-box:nth-child(1){transition-delay:.2s;}
.chart-box:nth-child(2){transition-delay:.3s;}
.chart-box:nth-child(3){transition-delay:.4s;}
.chart-box:nth-child(4){transition-delay:.5s;}

.chart-box:hover{
    transform:translateY(-6px);

    box-shadow:
        0 20px 40px rgba(0,0,0,.35);
}

.chart-box h3{
    margin-bottom:18px;
    font-size:16px;
}

/* ================= PIE ================= */
.pie-wrap{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:28px;
    flex-wrap:wrap;
}

.pie{
    width:160px;
    height:160px;

    border-radius:50%;

    background:conic-gradient(
        #7b61ff 0 20%,
        #00c896 20% 40%,
        #2d9cff 40% 60%,
        #ff9a44 60% 80%,
        #ff5b5b 80% 100%
    );

    position:relative;

    animation:spinPie 16s linear infinite;

    box-shadow:
        0 0 35px rgba(255,255,255,.15);
}

.pie::after{
    content:'ERP';
    position:absolute;
    inset:22px;

    border-radius:50%;

    background:rgba(9,15,28,.95);

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:800;
    font-size:22px;

    letter-spacing:2px;
}

@keyframes spinPie{
    from{
        transform:rotate(0deg);
    }
    to{
        transform:rotate(360deg);
    }
}

/* LEGEND */
.legend{
    display:flex;
    flex-direction:column;
    gap:10px;
    font-size:13px;
}

.legend span{
    display:flex;
    align-items:center;
}

.legend i{
    width:12px;
    height:12px;
    border-radius:4px;
    margin-right:10px;
}

.c1{background:#7b61ff;}
.c2{background:#00c896;}
.c3{background:#2d9cff;}
.c4{background:#ff9a44;}
.c5{background:#ff5b5b;}

/* KPI */
.kpi-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:14px;
    margin-top:12px;
}

.kpi-item{
    padding:18px;
    border-radius:18px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.06);

    text-align:center;

    transition:.25s ease;
}

.kpi-item:hover{
    transform:translateY(-4px);
    background:rgba(255,255,255,.08);
}

.kpi-item h2{
    font-size:34px;
    margin-bottom:6px;
}

.kpi-item p{
    opacity:.7;
}

/* CHART HEIGHT */
#lineChart{
    width:100% !important;
    height:140px !important;
}

#barChart{
    max-height:190px;
}

/* RESPONSIVE */
@media(max-width:1100px){

    .charts{
        grid-template-columns:1fr;
    }

}

@media(max-width:860px){

    body{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
    }

    .grid{
        grid-template-columns:repeat(2,1fr);
    }

    .header h1{
        font-size:38px;
    }

}

@media(max-width:600px){

    .grid{
        grid-template-columns:1fr;
    }

    .topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .content{
        padding:20px;
    }

}
.logo{
    width:52px;
    height:52px;

    border-radius:16px;

    background:
        linear-gradient(135deg,#4facfe,#00f2fe);

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;

    box-shadow:
        0 0 30px rgba(79,172,254,.45);
}

.logo img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:16px;
}
/* ================= PROFILE ================= */

.profile-box{
    display:flex;
    align-items:center;
    gap:14px;

    padding:14px;
    margin-bottom:22px;

    border-radius:18px;

    background:rgba(255,255,255,.06);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(12px);

    box-shadow:
        0 10px 25px rgba(0,0,0,.18);
}

.profile-avatar{
    width:58px;
    height:58px;

    border-radius:18px;

    overflow:hidden;

    flex-shrink:0;

    box-shadow:
        0 0 25px rgba(79,172,254,.35);
}

.profile-avatar img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.profile-info h4{
    font-size:15px;
    font-weight:700;
    margin-bottom:4px;
}

.profile-info p{
    font-size:12px;
    opacity:.7;
    margin-bottom:8px;
}

/* ONLINE STATUS */
.online-status{
    display:flex;
    align-items:center;
    gap:8px;

    font-size:12px;
    color:#7dffb3;
    font-weight:600;
}

.dot{
    width:10px;
    height:10px;

    border-radius:50%;

    background:#22c55e;

    box-shadow:
        0 0 12px #22c55e;

    animation:pulse 1.5s infinite;
}

@keyframes pulse{
    0%{
        transform:scale(1);
        opacity:1;
    }
    50%{
        transform:scale(1.4);
        opacity:.6;
    }
    100%{
        transform:scale(1);
        opacity:1;
    }
}

/* ================= CLOCK ================= */

.clock-box{
    margin-bottom:22px;

    padding:16px;

    border-radius:18px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    text-align:center;
}

.clock-label{
    font-size:12px;
    opacity:.7;
    margin-bottom:8px;
    letter-spacing:1px;
}

#clock{
    font-size:28px;
    font-weight:800;

    color:#dff6ff;

    letter-spacing:2px;

    text-shadow:
        0 0 20px rgba(79,172,254,.55);
}


</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<canvas id="rain"></canvas>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">

    <div class="logo-area">

        <div class="logo">
    <img src="/logo.png" alt="Logo">
</div>

        <div class="logo-text">
            <h2>F.TECNOLOGY</h2>
            <p>Enterprise System</p>
        </div>

    </div>

    <div class="menu-title">
        MENU DIREKSI
    </div>

    <div class="grid">

        <div class="card">
            <div class="icon purple">
                <span>DU</span>
            </div>

            <h3>Direktur Utama</h3>

            <button onclick="location.href='{{ route('direktur.utama') }}'">
                Masuk
            </button>
        </div>

        <div class="card">
            <div class="icon green">
                <span>DK</span>
            </div>

            <h3>Direktur Keuangan</h3>

            <button onclick="location.href='/direktur-keuangan'">
                Masuk
            </button>
        </div>

        <div class="card">
            <div class="icon blue">
                <span>DO</span>
            </div>

            <h3>Direktur Operasi</h3>

            <button onclick="location.href='/direktur-operasi'">
                Masuk
            </button>
        </div>

        <div class="card">
            <div class="icon orange">
                <span>DP</span>
            </div>

            <h3>Direktur Pemasaran</h3>

            <button onclick="location.href='/direktur-pemasaran'">
                Masuk
            </button>
        </div>

        <div class="card">
            <div class="icon red">
                <span>DS</span>
            </div>

            <h3>Direktur SDM</h3>

            <button onclick="location.href='/direktur-sdm'">
                Masuk
            </button>
        </div>

    </div>

</div>

<!-- ================= CONTENT ================= -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar">

    <!-- LEFT -->
    <div class="topbar-left">
        <h2>Dashboard</h2>

        <p>
            Selamat Datang pak {{ session('nama') ?? 'Pengguna' }}
        </p>
    </div>

    <!-- CENTER -->
    <div class="topbar-center">

        <div class="clock-box">

            <div class="clock-label">
                Waktu Sistem
            </div>

            <div id="clock">
                00:00:00
            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="topbar-right">

        <!-- PROFILE -->
        <div class="profile-box">

            <div class="profile-avatar">
                <img src="/logo.png" alt="Profile">
            </div>

            <div class="profile-info">

                <h4>
                    {{ session('nama') ?? 'Direktur' }}
                </h4>

                <p>
                    {{ session('jabatan') ?? 'Direksi Perusahaan' }}
                </p>

                <div class="online-status">
                    <span class="dot"></span>
                    Online
                </div>

            </div>

        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="logout">
                Logout
            </button>
        </form>

    </div>

</div>

    <!-- HEADER -->
    <div class="header">
        <h1>ERP Dashboard</h1>
        <p>
            Enterprise Resource Planning & Monitoring System
        </p>
    </div>

    <!-- CHARTS -->
    <div class="charts">

        <!-- BAR -->
        <div class="chart-box">

            <h3>Statistik Akses Direksi</h3>

            <canvas id="barChart"></canvas>

        </div>

        <!-- PIE -->
        <div class="chart-box">

            <h3>Komposisi Divisi</h3>

            <div class="pie-wrap">

                <div class="pie"></div>

                <div class="legend">
                    <span><i class="c1"></i> Utama</span>
                    <span><i class="c2"></i> Keuangan</span>
                    <span><i class="c3"></i> Operasi</span>
                    <span><i class="c4"></i> Pemasaran</span>
                    <span><i class="c5"></i> SDM</span>
                </div>

            </div>

        </div>

        <!-- LINE -->
        <div class="chart-box">

            <h3>Tren Aktivitas Sistem</h3>

            <canvas id="lineChart"></canvas>

        </div>

        <!-- KPI -->
        <div class="chart-box">

            <h3>Ringkasan Sistem</h3>

            <div class="kpi-grid">

                <div class="kpi-item">
                    <h2>5</h2>
                    <p>Direksi</p>
                </div>

                <div class="kpi-item">
                    <h2>128</h2>
                    <p>Akses</p>
                </div>

                <div class="kpi-item">
                    <h2>12</h2>
                    <p>Proyek</p>
                </div>

                <div class="kpi-item">
                    <h2>98%</h2>
                    <p>Stabil</p>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= LOAD ================= -->
<script>

window.addEventListener("load", () => {

    document.body.classList.add("show");

});

</script>

<!-- ================= BAR CHART ================= -->
<script>

const chartEl = document.getElementById('barChart');

let dataBar = [90,70,60,80,50];

const barChart = new Chart(chartEl, {

    type: 'bar',

    data: {
        labels: ['Utama','Keuangan','Operasi','Pemasaran','SDM'],
        datasets: [{
            data: dataBar,
            backgroundColor: [
                '#7c3aed',
                '#10b981',
                '#3b82f6',
                '#f97316',
                '#ef4444'
            ],
            borderRadius: 10
        }]
    },

    options: {

        responsive:true,

        animation:{
            duration:1000,
            easing:'easeOutQuart'
        },

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{

            x:{
                ticks:{
                    color:'#fff'
                },
                grid:{
                    color:'rgba(255,255,255,.05)'
                }
            },

            y:{
                beginAtZero:true,
                max:100,

                ticks:{
                    color:'#fff'
                },

                grid:{
                    color:'rgba(255,255,255,.05)'
                }
            }

        }

    }

});

setInterval(() => {

    dataBar = dataBar.map(val => {

        let next = val + (Math.random() * 12 - 6);

        return Math.max(20, Math.min(100, next));

    });

    barChart.data.datasets[0].data = dataBar;

    barChart.update();

}, 1600);

</script>

<!-- ================= LINE CHART ================= -->
<script>

const ctxLine = document.getElementById('lineChart');

let dataLine = [28, 30, 32, 34, 33, 35, 34];

const gradient = ctxLine.getContext('2d').createLinearGradient(0, 0, 0, 180);

gradient.addColorStop(0, 'rgba(79,172,254,0.45)');
gradient.addColorStop(1, 'rgba(79,172,254,0)');

const glowPlugin = {

    id: 'glow',

    beforeDatasetDraw(chart){

        const {ctx} = chart;

        ctx.save();

        ctx.shadowColor = '#4facfe';
        ctx.shadowBlur = 18;

    },

    afterDatasetDraw(chart){

        chart.ctx.restore();

    }

};

const lineChart = new Chart(ctxLine, {

    type: 'line',

    data: {

        labels:['','','','','','',''],

        datasets:[{

            data:dataLine,

            borderColor:'#4facfe',

            backgroundColor:gradient,

            tension:.45,

            fill:true,

            borderWidth:3,

            pointRadius:0

        }]

    },

    options:{

        responsive:true,

        maintainAspectRatio:false,

        animation:false,

        plugins:{
            legend:{display:false},
            tooltip:{enabled:false}
        },

        scales:{

            x:{
                display:false
            },

            y:{
                display:false,
                min:28,
                max:38
            }

        }

    },

    plugins:[glowPlugin]

});

let targetData = [...dataLine];
let currentData = [...dataLine];

function smoothUpdate(){

    currentData = currentData.map((val, i) => {
        return val + (targetData[i] - val) * 0.06;
    });

    lineChart.data.datasets[0].data = currentData;

    lineChart.update('none');

    requestAnimationFrame(smoothUpdate);

}

smoothUpdate();

setInterval(() => {

    let last = targetData[targetData.length - 1];

    if(!window.trend) window.trend = 0;

    window.trend += (Math.random() * 2 - 1) * 0.5;

    window.trend = Math.max(-1.5, Math.min(1.5, window.trend));

    let noise = (Math.random() * 0.4 - 0.2);

    let next = last + window.trend + noise;

    next = Math.max(28, Math.min(38, next));

    targetData.shift();

    targetData.push(next);

}, 1400);

</script>

<!-- ================= RAIN ================= -->
<script>

const canvas = document.getElementById('rain');

const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let drops = [];

for(let i = 0; i < 220; i++){

    drops.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        length: Math.random() * 20 + 10,
        speed: Math.random() * 5 + 4
    });

}

function draw(){

    ctx.clearRect(0,0,canvas.width,canvas.height);

    ctx.strokeStyle = 'rgba(255,255,255,0.22)';
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

window.addEventListener('resize', () => {

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

});

</script>
<script>

function updateClock(){

    const now = new Date();

    const h = String(now.getHours()).padStart(2,'0');
    const m = String(now.getMinutes()).padStart(2,'0');
    const s = String(now.getSeconds()).padStart(2,'0');

    document.getElementById('clock').innerHTML =
        `${h}:${m}:${s}`;
}

setInterval(updateClock,1000);

updateClock();

</script>
</body>
</html>