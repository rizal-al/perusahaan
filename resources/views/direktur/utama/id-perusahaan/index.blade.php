<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>ID Perusahaan</title>
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
    background:
        linear-gradient(rgba(8,12,25,.76), rgba(8,12,25,.76)),
        url('/properti.png') no-repeat center center;
    background-size:cover;      /* FULL layar */
    background-attachment:fixed;
    background-position:center;
    background-repeat:no-repeat;

    color:white;
    padding:30px;
    overflow-x:hidden;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h2{
    font-size:28px;
    font-weight:700;
    letter-spacing:.5px;
}

/* BUTTON */
.back,
.add-btn{
    text-decoration:none;
    color:white;
    transition:.3s;
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
}

.back{
    padding:10px 18px;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.15);
}

.back:hover{
    background:rgba(255,255,255,0.15);
    transform:translateY(-2px);
}

.add-btn{
    display:inline-block;
    margin-bottom:22px;
    padding:12px 20px;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    box-shadow:0 10px 30px rgba(37,99,235,.3);
    font-weight:600;
}

.add-btn:hover{
    transform:translateY(-2px) scale(1.02);
    box-shadow:0 15px 35px rgba(37,99,235,.4);
}

/* GLASS CARD */
.card{
    position:relative;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.18);
    border-radius:28px;
    padding:30px;
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
    box-shadow:
        0 8px 32px rgba(0,0,0,0.35),
        inset 0 1px 1px rgba(255,255,255,0.15);
    overflow:hidden;
}

/* EFEK CAHAYA */
.card::before{
    content:'';
    position:absolute;
    top:-120px;
    right:-120px;
    width:260px;
    height:260px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    filter:blur(10px);
}

.card h3{
    margin-bottom:18px;
    font-size:22px;
    font-weight:600;
}

/* TABLE */
.table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
}

.table th,
.table td{
    padding:16px 14px;
    text-align:left;
}

.table th{
    background:rgba(255,255,255,0.08);
    color:#e2e8f0;
    font-size:14px;
    letter-spacing:.5px;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

.table td{
    color:#f8fafc;
}

.table tr{
    transition:.25s;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.table tr:hover{
    background:rgba(255,255,255,0.05);
    transform:scale(1.003);
}

/* STATUS */
.status{
    background:rgba(34,197,94,.18);
    color:#4ade80;
    padding:6px 12px;
    border:1px solid rgba(74,222,128,.3);
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

/* DELETE BUTTON */
.delete{
    background:linear-gradient(135deg,#dc2626,#ef4444);
    border:none;
    padding:8px 14px;
    border-radius:10px;
    color:white;
    cursor:pointer;
    width:auto;
    transition:.25s;
    font-weight:600;
}

.delete:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(239,68,68,.35);
}

/* GLOBAL BUTTON */
button{
    padding:10px;
    border:none;
    border-radius:8px;
    color:white;
    cursor:pointer;
}

/* SUCCESS ALERT */
.success{
    background:rgba(34,197,94,.15);
    border:1px solid rgba(74,222,128,.3);
    color:#bbf7d0;
    padding:14px;
    border-radius:14px;
    margin-bottom:18px;
    text-align:center;
    backdrop-filter:blur(10px);
    opacity:1;
    transition:opacity .5s ease;
}

/* RESPONSIVE */
@media(max-width:768px){

    body{
        padding:18px;
    }

    .header{
        flex-direction:column;
        gap:15px;
        align-items:flex-start;
    }

    .card{
        overflow-x:auto;
        padding:20px;
    }

    .table{
        min-width:700px;
    }
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
<div class="header">
    <h2>🏢 Manajemen ID Perusahaan</h2>
    <a href="/direktur-utama/home" class="back">← Kembali</a>
</div>

<a href="{{ route('id-perusahaan.create') }}" class="add-btn">+ Tambah ID</a>

@if(session('success'))
    <div id="alert-success" class="success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h3 style="margin-bottom:15px;">Daftar ID Perusahaan</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Direksi</th>
                <th>ID Perusahaan</th>
                <th>Status ID</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        @forelse($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->direksi }}</td>
                <td>{{ $d->id_perusahaan }}</td>
                <td><span class="status">Aktif</span></td>
                <td>
                    <form method="POST" action="/id-perusahaan/{{ $d->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="delete">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center; opacity:0.6;">
                    Belum ada data
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<script>
setTimeout(function() {
    let alert = document.getElementById('alert-success');
    if (alert) {
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 500);
    }
}, 2000);
</script>
<script>
const canvas = document.getElementById('rain');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// ================= HUJAN =================
let drops = [];

for(let i=0;i<200;i++){
    drops.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        length: Math.random() * 20 + 10,
        speed: Math.random() * 5 + 5
    });
}

// ================= PETIR =================
let lightning = [];
let flash = 0;

// 🔥 bikin petir utama + cabang
function createLightning(){
    let x = Math.random() * canvas.width;
    let y = 0;

    let path = [{x, y}];

    for(let i=0;i<12;i++){
        x += (Math.random() - 0.5) * 60;
        y += Math.random() * 35 + 10;
        path.push({x,y});
    }

    lightning.push({
        path: path,
        life: 12
    });

    // 🔥 CABANG PETIR
    if(Math.random() > 0.5){
        let branch = [];
        let bx = path[3].x;
        let by = path[3].y;

        branch.push({x:bx, y:by});

        for(let i=0;i<6;i++){
            bx += (Math.random() - 0.5) * 40;
            by += Math.random() * 25 + 5;
            branch.push({x:bx,y:by});
        }

        lightning.push({
            path: branch,
            life: 8
        });
    }

    flash = 8; // 🔥 lebih terang
}

// 🔥 PETIR LEBIH SERING + BANYAK SEKALIGUS
setInterval(() => {
    if(Math.random() > 0.4){ // lebih sering
        let count = Math.floor(Math.random() * 3) + 1; // 1-3 petir sekaligus
        for(let i=0;i<count;i++){
            createLightning();
        }
    }
}, 1200); // lebih cepat

// ================= DRAW =================
function draw(){
    ctx.clearRect(0,0,canvas.width,canvas.height);

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

    // 🔥 PETIR (dengan glow)
    ctx.lineWidth = 2.5;
    ctx.strokeStyle = 'rgba(255,255,255,0.95)';
    ctx.shadowBlur = 15;
    ctx.shadowColor = '#ffffff';

    lightning.forEach((l, index) => {
        ctx.beginPath();
        ctx.moveTo(l.path[0].x, l.path[0].y);

        for(let i=1;i<l.path.length;i++){
            ctx.lineTo(l.path[i].x, l.path[i].y);
        }

        ctx.stroke();

        l.life--;
        if(l.life <= 0){
            lightning.splice(index,1);
        }
    });

    ctx.shadowBlur = 0;

    // 🔥 FLASH
    if(flash > 0){
        ctx.fillStyle = 'rgba(255,255,255,0.15)';
        ctx.fillRect(0,0,canvas.width,canvas.height);
        flash--;
    }

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