<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akses Direktur Utama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       body{
    margin:0;
    font-family:'Segoe UI',sans-serif;

    background:
        linear-gradient(rgba(0,0,0,0.60), rgba(0,0,0,0.60)),
        url('/properti.png') no-repeat center center;

    background-size:cover;     /* gambar dipotong agar penuh dan pas layar */
    background-attachment:fixed;
    
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    overflow:hidden;
    color:white;
}

        .card {
            width: 350px;
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            text-align: center;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 20px;
        }

        input, button {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border-radius: 10px;
    box-sizing: border-box; /* ini kuncinya */
}

input {
    border: none;
}

/* tombol umum */
button {
    display: block;
    width: 100%;
    margin-top: 12px;
    padding: 12px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
}

/* tombol MASUK (utama) */
button[type="submit"] {
    border: none;
    background: linear-gradient(to right, #4facfe, #00f2fe);
    color: white;
}

/* tombol KEMBALI (sekunder) */
button[type="button"] {
    background: transparent;
    border: 1px solid rgba(255,255,255,0.3);
    color: #e2e8f0;
}

/* efek hover */
button[type="button"]:hover {
    background: rgba(255,255,255,0.1);
}

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 6px;
            font-size: 12px;
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
<script>
    setTimeout(function() {
        var el = document.getElementById('errorBox');
        if (el) {
            el.style.display = 'none';
        }
    }, 2000);
</script>
<body>
<canvas id="rain"></canvas>
<div class="card">
    <h2>Akses Direktur Utama</h2>
    <p>Masukkan jabatan & ID perusahaan untuk melanjutkan</p>

    @if(session('error'))
    <div class="error" id="errorBox">{{ session('error') }}</div>
@endif

    <form method="POST" action="/cek-akses-direktur">
    @csrf

    <input type="text"
       name="jabatan"
       placeholder="Jabatan"
       autocomplete="off"
       required>

<input type="text"
       name="id_perusahaan"
       placeholder="ID Perusahaan"
       autocomplete="off"
       required>

    <button type="submit">MASUK</button>

    <button type="button" onclick="location.href='/dashboard'">
        KEMBALI
    </button>
</form>
</div>
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