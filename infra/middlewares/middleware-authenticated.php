<?php

require_once __DIR__ . '/../../helpers/session.php';

if (!isAuthenticated()) {
    header('Location: ../../');
}
