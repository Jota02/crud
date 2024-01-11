<?php
require_once __DIR__ . '../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../helpers/session.php';

include_once __DIR__ . '../../../templates/header.php';

$user = user();
$title = '- App';

include_once __DIR__ . '../../../templates/navbar.php';
?>

<!--content-->
<div class="account-page-styles home-cover" style="min-height: 100vh;">
    <div class="container py-3">  
        <main class="account-form-wrapper text-white">
            <div class="container-fluid py-5 mx-5 welcome">
                <h1 class="display-5 fw-bold">Hello
                    <?= $user['name'] ?? null ?>!
                </h1>
                <p class="fs-4">What are we watching today?</p>
            </div>
        </main>
    </div>
</div>

<?php
  include_once __DIR__ . '../../../templates/footer.php';
?>