<?php
$service = app(\App\Services\SecureAuthenticationService::class);
$result = $service->authenticate('estudiante@test.com', 'password789');
print_r($result);

$result2 = $service->authenticate('superadmin@test.com', 'password123');
print_r($result2);
