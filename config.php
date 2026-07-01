<?php
// Evita erro se session_start() já tiver sido chamado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
