<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= isset($description) ? $description : ''; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titre) ? $titre : 'Projet'; ?></title>
    <!-- Utilisation d'un thème bootswatch basé sur Bootstrap (https://bootswatch.com/flatly/) -->
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= BASE_URL; ?>">Philliance Formation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ms-auto">
                    
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL; ?>lessons">Leçons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL; ?>categories">Catégories</a>
                        </li>
                        <?php if (App\Controllers\ConnexionController::logged_user()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL; ?>users/profil/<?= $_SESSION['user']['id']; ?>">Mon compte</a>
                        </li>
                        
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php if (App\Controllers\ConnexionController::logged_user()) : ?>
                            <a class="nav-link" href="<?= BASE_URL; ?>logout">Déconnexion</a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= BASE_URL; ?>login"><i class="far fa-user 3x"></i> | Connexion</a>
                        <?php endif; ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Affichage des messages -->
    <?php
    foreach (App\Controllers\FlashController::getFlash() as $message) {
    ?>
        <p class="my-2 alert alert-<?= $message['type']; ?>"><?= $message['texte']; ?>
        <?php
    }
        ?>

        <div class="container main">


            <?= $content; ?>

        </div>

        <footer>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary footer">
                <p>© 2022 Philliance l All rights reserved.</p>
                <ul class="navbar-nav ms-auto">
                <li class="nav-item navbar-brand">
                <a href="<?= BASE_URL; ?>home/conditionsUtilisation">Conditions utilisations</a>
                </li>
                <li class="nav-item navbar-brand">|
                <a href="<?= BASE_URL; ?>home/faq">FAQ</a>
                </li>
                <li class="nav-item navbar-brand">|
                <a href="<?= BASE_URL; ?>home/contact">Contactez-nous</a>
                </li>
</ul>
            </nav>
        </footer>

</body>

</html>