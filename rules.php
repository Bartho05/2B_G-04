<?php

// Verifica se o usuário está logado
function isLoggedIn()
{
    return isset($_SESSION['user']);
}

// Retorna os dados do usuário logado (ou null)
function getLoggedUser()
{
    return $_SESSION['user'] ?? null;
}

// Verifica se o usuário logado tem um tipo específico (admin, moderator, user)
function hasType($type)
{
    return isLoggedIn() && $_SESSION['user']['type'] === $type;
}
