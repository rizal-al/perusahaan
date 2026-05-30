<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pemegang Direksi</title>

<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}

body {
    font-family: 'Segoe UI', sans-serif;

    background:
        linear-gradient(rgba(8,12,25,.76), rgba(8,12,25,.76)),
        url('/properti.png') no-repeat center center;

    background-size: cover;
    background-attachment: fixed;

    color: white;
    min-height: 100vh;
}

/* HEADER */
.header {
    padding: 20px 30px;
    font-size: 22px;
    font-weight: 700;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* BACK BUTTON */
.back {
    background: rgba(255,255,255,0.15);
    padding: 8px 14px;
    border-radius: 8px;
    text-decoration: none;
    color: white;
    font-size: 14px;
}

/* DASHBOARD GRID */
.dashboard {
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    gap: 15px;
}

/* ================= GLASS CARD BASE ================= */
.stat,
.card {
    position: relative;
    background: rgba(31, 41, 55, 0.35);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 12px;
    overflow: hidden;
    z-index: 1;
    border: 1px solid rgba(255,255,255,0.08);
}

/* STAT STYLE */
.stat {
    text-align: center;
    padding: 20px;
}

.stat h2 {
    margin: 0;
    font-size: 28px;
}

.stat span {
    opacity: 0.7;
}

/* MAIN CARD */
.card {
    grid-column: 1 / -1;
    padding: 20px;
}

/* ================= NEON BORDER ANIMATION ================= */
.stat::after,
.card::after,
.box::after,
.chart-box::after,
.summary-box::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 12px;
    padding: 2px;

    background: linear-gradient(
        120deg,
        transparent 0%,
        rgba(255,255,255,0.15) 20%,
        #ffffff 40%,
        rgba(255,255,255,0.15) 60%,
        transparent 100%
    );

    background-size: 300% 300%;
    animation: borderRun 8s linear infinite;

    filter: blur(2px) brightness(1.5);

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;

    pointer-events: none;
}

/* ANIMATION */
@keyframes borderRun {
    0% { background-position: 0% 50%; }
    100% { background-position: 300% 50%; }
}

/* TABLE */
.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: rgba(55, 65, 81, 0.6);
    padding: 12px;
    text-align: left;
}

td {
    padding: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

/* STATUS */
.status {
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 12px;
}

.active {
    background: green;
}

.inactive {
    background: red;
}

.empty-state {
    text-align: center;
    padding: 20px;
    opacity: 0.6;
}

/* HOVER EFFECT */
.stat:hover,
.card:hover {
    transform: translateY(-3px);
    transition: 0.3s ease;
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
</style>
</head>

<body>
<canvas id="rain"></canvas>
<div class="header">
    📊 PEMEGANG DIREKSI
    <a href="/direktur-utama/home" class="back">← Kembali</a>
</div>

<div class="dashboard">

    <!-- STAT -->
    <div class="stat">
    <span>Total Direksi</span>
    <h2>0</h2>
</div>

<div class="stat">
    <span>Direksi Aktif</span>
    <h2>0</h2>
</div>

<div class="stat">
    <span>Direksi Tidak Aktif</span>
    <h2>0</h2>
</div>
    <!-- TABLE -->
    <div class="card">

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>ID Perusahaan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($perusahaans as $index => $p)
                    @php
                        $d = $direksis[$p->id_perusahaan] ?? null;
                        $lengkap = $d && $d->nama && $d->email && $d->jabatan;
                    @endphp

                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $d->nama ?? '-' }}</td>
                        <td>{{ $d->email ?? '-' }}</td>
                        <td>{{ $d->jabatan ?? '-' }}</td>
                        <td>{{ $p->id_perusahaan ?? '-' }}</td>
                        <td>
                            @if($lengkap)
                                <span class="status active">Aktif</span>
                            @else
                                <span class="status inactive">Tidak Aktif</span>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                Data belum tersedia
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>
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