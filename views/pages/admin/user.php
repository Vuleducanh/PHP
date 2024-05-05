<div id="content">
        <div id="header-content">
            <i class="fa-solid fa-bars"></i>
            <ul class="tab-list-product">
                <li><a>Tất cả sản phẩm</a></li>
                <li><a>Áo</a></li>
                <li><a>Quần</a></li>
                <li><a>Phụ kiện</a></li>
            </ul>
            <div class="container-list-product"></div>
            <i class="fa-solid fa-sort-down"></i> <i class="fa-solid fa-user"></i>
        </div>

        <div id="func">
        </div>
        <div id="div-table">
            <table class="product-table">
                <thead>
                    <tr>
                        <th class="phone">Phone</th>
                        <th class="name">Name</th>
                        <th class="role">Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($dataUser['dataUser'] as $user): ?>
                    <tr>
                    <td><h1 type="text" id="phone" name="phone" style="font-size: 18px;"><?php echo $user->getPhone();?></h1></td>
                    <td><h1 type="text" id="name" name="name" style="font-size: 18px;"><?php echo $user->getName();?></h1></td>
                        <td>
                            <select id="role<?php echo $user->getIdUser();?>" name="role">
                            <?php
                            $role = $user->getRole()->getCodeRole();
                            ?>
                            <?php if ($role == 'ADMIN'): ?>
                                <option value="1" selected>ADMIN</option>
                                <option value="3">ADMIN2</option>
                                <option value="2">USER</option>
                            <?php elseif ($role == 'ADMIN2'): ?>
                                <option value="3"selected>ADMIN2</option>
                                <option value="1">ADMIN</option>
                                <option value="2">USER</option>
                            <?php else: ?>
                                <option value="2" selected>USER</option>
                                <option value="1">ADMIN</option>
                                <option value="3">ADMIN2</option>
                            <?php endif; ?>
                        </select>
                        </td>
                        <td>
                            <button  value="<?php echo $user->getIdUser();?>" type="button" onclick="updateRole(this)" style="width: 100px; background-color: #4CAF50; color: white;">Đổi</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>


    <script >
        
		function updateRole(button) {
            var userId = button.value;
            var role = document.getElementById('role'+userId).value;
            alert( "update" );
            window.location = "http://localhost:8008/PHP/index.php?controller=admin&action=updateRoleUser&newRole=" + role +"&idUser="+userId;
        }
	</script>
