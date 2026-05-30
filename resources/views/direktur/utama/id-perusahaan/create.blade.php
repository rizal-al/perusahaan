<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah ID Perusahaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* 🔥 CARD LEBIH BESAR */
.form-box {
    width: 520px; /* diperbesar */
    padding: 40px; /* lebih lega */
    background: rgba(255,255,255,0.95);
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    backdrop-filter: blur(10px);
}

/* HEADER */
h2 {
    text-align: center;
    margin-bottom: 5px;
    font-size: 24px;
    color: #1e293b;
}

.subtitle {
    text-align: center;
    font-size: 14px;
    color: #64748b;
    margin-bottom: 25px;
}

/* INPUT */
input {
    width: 100%;
    padding: 14px;
    margin: 10px 0 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    transition: 0.2s;
    font-size: 14px;
}

input:focus {
    border-color: #2563eb;
    outline: none;
    box-shadow: 0 0 8px rgba(37,99,235,0.4);
}

/* BUTTON */
button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(90deg, #2563eb, #1e40af);
    color: white;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    transition: 0.2s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

/* BACK */
.back {
    text-align: center;
    margin-top: 18px;
}

.back a {
    text-decoration: none;
    color: #2563eb;
    font-size: 14px;
}

/* SUCCESS */
.success {
    background: #16a34a;
    color: white;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 18px;
    text-align: center;
    font-size: 14px;

    opacity: 1;
    transition: opacity 0.5s ease;
}

/* ERROR */
.error {
    background: #dc2626;
    color: white;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 18px;
    font-size: 13px;
}
</style>
</head>
<body>

<div class="form-box">

    <h2>Tambah ID Perusahaan</h2>
    <div class="subtitle">Masukkan data direksi & ID perusahaan</div>

    @if(session('success'))
        <div id="alert-success" class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/id-perusahaan">
        @csrf

        <input type="text" name="direksi" placeholder="Nama Direksi" required>

        <input type="text" name="id_perusahaan" placeholder="ID Perusahaan" required>

        <button type="submit">Simpan Data</button>
    </form>

    <div class="back">
        <a href="/id-perusahaan">← Kembali ke Dashboard</a>
    </div>

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

</body>
</html>