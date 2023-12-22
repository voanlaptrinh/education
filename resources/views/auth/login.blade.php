<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<form action="{{ route('login') }}" method="post">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required>

    <button type="submit">Đăng Nhập</button>
</form>
