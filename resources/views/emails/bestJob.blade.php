<!DOCTYPE html>
<html>
<head>
    <title>Informasi Pekerjaan Terbaik</title>
</head>
<body>
    <h1>Informasi Pekerjaan Terbaik</h1>

    <p>Berikut adalah detail pekerjaan terbaik yang sesuai dengan kandidat:</p>

    <h2>
        <a href="http://127.0.0.1:8000/apply/{{ $bestJob->jobID }}">Detail Pekerjaan</a>
    </h2>
    <ul>
        <li><strong>Judul Pekerjaan : </strong>{{ $bestJob->jobtitle }}</li>
        <li><strong>Spesialisasi Pekerjaan : </strong>{{ $bestJob->jobspesialis }}</li>
        <li><strong>Deskripsi Pekerjaan : </strong>{{ $bestJob->jobdeskripsion }}</li>
    </ul>
    <p>Jangan ragu untuk menghubungi kami jika Anda tertarik atau memiliki pertanyaan lebih lanjut tentang pekerjaan ini.</p>

    <p>Terima kasih atas perhatian Anda!</p>
</body>
</html>
