<div id="content">
    <div id="background_login">

        <?php
        // Hiển thị thông báo nếu có
        if (isset($_GET['incorrectAccount'])) {
            echo '<div class="alert alert-danger" role="alert">Tên đăng nhập hoặc mật khẩu sai!</div>';
        } elseif (isset($_GET['accessDenied'])) {
            echo '<div class="alert alert-warning" role="alert">Bạn không có quyền truy cập!</div>';
        } elseif (isset($_GET['sessionTimeout'])) {
            echo '<div class="alert alert-info" role="alert">Phiên làm việc hết hạn, yêu cầu đăng nhập lại!</div>';
        }elseif (isset($_GET['registerSuccess'])) {
            echo '<div class="alert alert-info" role="alert">Tạo tài khoản thành công</div>';
        }
        ?>
        
        <div id="login">
            <h2 id="title_login">Đăng nhập</h2>
            <h3 id="name_shop">Singed/Shop</h3>

            <form id="login_form" action="http://localhost:8008/PHP/index.php?controller=login&action=loginAuthentication" method="post">
                <input id="phone_number" name="username" type="text" placeholder="Số điện thoại" required>
                <input id="passwd" name="password" type="password" placeholder="Mật khẩu" required>
                <button id="btn_login" type="submit">Đăng nhập</button>
            </form>

            <div id="login_google">
                <a id="or">hoặc</a>
                <img id="img_google" src="./assets/img/google.png">
            </div>
            <div id="reques_register">
                Chưa có tài khoản? <a href="http://localhost:8008/PHP/index.php?controller=register&action=register" id="text_register">Đăng ký</a> 
            </div>
            <a id="forgot_passwd" href="fogot_passwd.html">Quên mật khẩu</a>
        </div>
    </div>
</div>