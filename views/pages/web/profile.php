
    <div class='container'>
              <?php $user = unserialize($_SESSION['user']); ?>

            <div class='avatar'>
              <img src='./assets/img/user.jpg'>
            </div>

            <div class='username'>
              <h3><?php echo $user->getName();?></h3>
            </div>

            <div class='button' >
                <div class='button__icon'>
                  <i class='fa-solid fa-phone'></i>
                </div>
                <div class='button__text'> Số điện thoại :  </div>
                <input type="text" class="input" id="phone" value="<?php echo $user->getPhone();?>"/>
              </div>

            <div class='button' >
              <div class='button__icon'>
                <i class="fa-regular fa-user"></i>
              </div>
              <div class='button__text'> Tuổi : </div>
              <input type="text" class="input" id="age" value="<?php echo $user->getAge();?>"/>
            </div>

            <div class='button' >
              <div class='button__icon'>
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class='button__text'> Địa chỉ :</div>
              <input type="text" class="input" id="address" value="<?php echo $user->getAddress();?>"/>
            </div>

            <div class='button' >
              <div class='button__icon'>
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class='button__text'>Email :</div>
              <input type="text" class="input" id="email" value="<?php echo $user->getEmail();?>"/>
            </div>

      <div class='button' >
              <div class='button__icon'>
                  <i class="fa-solid fa-venus-mars"></i>
              </div>
              
              <div class='button__text'>Giới tính : </div>
              <select id="gender" name="gender">
                  <?php
                  $userGender = $user->getRole();
                  ?>
                  <?php if ($userGender == 'Nam'): ?>
                      <option value="Nam" selected>Nam</option>
                      <option value="Nữ">Nữ</option>
                      <option value="Khác">Khác</option>
                  <?php elseif ($userGender == 'Nữ'): ?>
                      <option value="Nam">Nam</option>
                      <option value="Nữ" selected>Nữ</option>
                      <option value="Khác">Khác</option>
                  <?php else: ?>
                      <option value="Khác" selected>Khác</option>
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                  <?php endif; ?>
              </select>
              </div>

            <button class="btn_save" onclick="getData()">CẬP NHẬT THÔNG TIN</button>
      </div>


    <script>

      function getData() {
          // Lấy giá trị từ biến input
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var age = document.getElementById('age').value;
        var address = document.getElementById('address').value;
        var gender = document.getElementById('gender').value;

        // Gọi hàm để thực hiện AJAX
        $.ajax({
          url: 'http://localhost:8008/PHP/index.php?controller=profile&action=updateProfile',
          data: {
              post: 'true',
              email: email,
              phone: phone,
              age: age,
              address: address,
              gender: gender,
          },
          type: 'POST',
          success: function(result) {
              if (result) 
                alert("Cập nhật thông tin thành công!");
          },
          error: function(error) {
              alert("Thất bại: " + error);
          }
      });
      }

  </script>
      
