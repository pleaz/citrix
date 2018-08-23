<?php

if (!empty($_GET['code'])) {
    $token = $rsService->requestAccessToken($_GET['code']);
    $result = json_decode($rsService->request('/public/v1/me'), true);
} elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
    $url = $rsService->getAuthorizationUri();
    header('Location: ' . $url);
} else {
    $url = $currentUri->getRelativeUri() . '?go=go';
    echo "<a href='$url'>Login</a>";
}
