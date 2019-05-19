<?php

function users_factory() {
    return [
        'name' => 'User ' . uniqid(),
        'username' => 'user_' . uniqid(),
        'password' => password_hash('user-password', PASSWORD_BCRYPT),
    ];
}
