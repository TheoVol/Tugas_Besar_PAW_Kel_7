<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h2>Register</h2>
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="hidden" name="role" value="customer">
        <button type="submit">Register</button>
    </form>
    <p><a href="/login">Sudah punya akun?</a></p>
</body>
</html>
