<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5e6ca;
            color: #5c4033;
        }

        nav {
            background: linear-gradient(90deg, #8b5a2b, #654321);
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        nav a {
            color: white; /* Mengubah warna teks menjadi putih */
            text-decoration: none;
            margin: 15px;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffcc80; /* Efek hover dengan warna emas */
        }

        .content {
            margin: 40px auto;
            padding: 30px;
            max-width: 800px;
            background: #fdf8f1;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            text-align: center;
        }

        .content:hover {
            transform: translateY(-5px);
        }

        .content h2 {
            font-weight: 600;
            color: #8b5a2b;
        }

        .about-section {
            display: flex;
            align-items: center;
            gap: 20px;
            text-align: left;
        }

        .about-section img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #8b5a2b;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #654321;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <nav>
        <a onclick="showContent('home')">Beranda</a>
        <a onclick="showContent('about')">Tentang Kami</a>
        <a onclick="showContent('contact')">Hubungi Kami</a>
    </nav>

    <div class="content" id="content">
        <h2>{{ $data['home']['title'] }}</h2>
        <p>{{ $data['home']['content'] }}</p>
    </div>

    <div id="data-container" data-json='@json($data)'></div>

    <script>
        let dataContainer = document.getElementById("data-container");
        let data = JSON.parse(dataContainer.getAttribute("data-json"));

        function showContent(page) {
            let contentDiv = document.getElementById("content");
            if (page === "home") {
                contentDiv.innerHTML = `
                    <h2>${data.home.title}</h2>
                    <p>${data.home.content}</p>
                `;
            } else if (page === "about") {
                contentDiv.innerHTML = `
                    <div class="about-section">
                        <img src="${data.about.foto}" alt="Foto Saya">
                        <div>
                            <h2 style="color:#8b5a2b;">Tentang Saya</h2>
                            <p>Halo, saya <strong>${data.about.nama}</strong>. Saya seorang <strong>${data.about.pekerjaan}</strong>.</p>
                            <p>Saya tertarik dengan <em>${data.about.minat}</em>.</p>
                        </div>
                    </div>
                `;
            } else if (page === "contact") {
                contentDiv.innerHTML = `
                    <h2 style="color:#8b5a2b;">${data.contact.title}</h2>
                    <p>Silakan isi formulir di bawah ini untuk menghubungi kami:</p>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Tulis pesan..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                `;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
