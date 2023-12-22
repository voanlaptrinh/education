<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <!-- resources/views/auth/register.blade.php -->

                    <form method="POST" action="{{ url('/register') }}">
                        @csrf

                        <!-- Thêm các trường của bạn tương ứng với bảng users -->
                        <label for="name">Tên:</label>
                        <input type="text" name="name" required>

                        <label for="username">Tên người dùng:</label>
                        <input type="text" name="username" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" required>

                        <!-- Thêm các trường khác theo bảng users -->

                        <label for="password">Mật khẩu:</label>
                        <input type="password" name="password" required>

                        <label for="password_confirmation">Xác nhận mật khẩu:</label>
                        <input type="password" name="password_confirmation" required>

                        <button type="submit">Đăng Ký</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
