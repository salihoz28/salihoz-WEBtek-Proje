<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$film = [];

if (isset($_GET['film'])) {
    $filmAdi = trim($_GET['film']);
    $apiKey = "1ed16b9a"; 
    $url = "https://www.omdbapi.com/?apikey=$apiKey&t=" . urlencode($filmAdi);

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data && $data['Response'] === "True") {
        $film = [
            "baslik" => $data['Title'],
            "yil" => $data['Year'],
            "tur" => $data['Genre'],
            "puan" => $data['imdbRating'],
            "poster" => $data['Poster']
        ];
    } else {
        $hata = "Film bulunamadı.";
    }
}
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İlgi Alanlarım</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #28a745;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Film Arama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="hakkimda.html">Anasayfa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-4 text-center">🎬 Film Arama</h2>

        <form method="GET" class="row g-3 justify-content-center mb-5">
            <div class="col-12 col-md-6">
                <input type="text" name="film" class="form-control form-control-lg" placeholder="Film adını girin" required
                    value="<?= isset($_GET['film']) ? htmlspecialchars($_GET['film']) : '' ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success btn-lg">Ara</button>
            </div>
        </form>

        <?php if (!empty($film)): ?>
            <div class="card mx-auto shadow" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                        <img src="<?= htmlspecialchars($film['poster']) ?>" alt="Poster" class="img-fluid rounded" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($film['baslik']) ?> (<?= htmlspecialchars($film['yil']) ?>)</h5>
                            <p class="card-text"><strong>Tür:</strong> <?= htmlspecialchars($film['tur']) ?></p>
                            <p class="card-text"><strong>IMDB:</strong> <?= htmlspecialchars($film['puan']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif (isset($hata)): ?>
            <div class="alert alert-danger text-center mx-auto" style="max-width: 400px;">
                <?= htmlspecialchars($hata) ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
