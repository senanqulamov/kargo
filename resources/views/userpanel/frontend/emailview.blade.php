Hello {{ $name }},<br><br>

Welcome to Shiplounge.<br><br>

Thank You for registering,<br>
ShipLounge

<a href="{{ route('userpanel.verifyEmail', ['email' => $email]) }}">
    Verify Email
</a>
