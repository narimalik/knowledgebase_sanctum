<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email from Sanctum </title>
</head>
<body>
    <x-mail.header/>
    Hi {{ $user->email }}
    its test email for sanctum
    <x-mail.footer/>
</body>
</html>!