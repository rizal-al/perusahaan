<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akses Direktur SDM</title>
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

button {
    display: block;
    width: 100%;
    margin-top: 10px;
    padding: 12px;
    border-radius: 10px;
    cursor: pointer;
}

/* MASUK */
button[type="submit"] {
    background: linear-gradient(to right, #4facfe, #00f2fe);
    color: white;
    border: none;
}

/* KEMBALI */
button[type="button"] {
    background: #334155;
    color: white;
    border: none;
}

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 6px;
            font-size: 12px;
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

<div class="card">
    <h2>Akses Direktur SDM</h2>
    <p>Masukkan jabatan & ID perusahaan untuk melanjutkan</p>

    @if(session('error'))
    <div class="error" id="errorBox">{{ session('error') }}</div>
@endif

    <form method="POST" action="{{ route('sdm.cek') }}">
        @csrf

        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <input type="text" name="id_perusahaan" placeholder="ID Perusahaan" required>

        <button type="submit">MASUK</button>
        <button type="button" onclick="location.href='/dashboard'">
        KEMBALI
    </button>
    </form>
</div>

</body>
</html>