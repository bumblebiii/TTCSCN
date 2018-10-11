<?php 
    include_once 'views/admin/layout/header.php';
?>
    <div class="container">
    <h3 align="center">FASHE MOBILE</h3>
    <h3 align="center">CẬP NHẬT THÔNG TIN</h3>
    <hr>
        <form action="?mod=employee&act=update" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã nhân viên</label>
                <input type="text" class="form-control" value="<?=$row['MA_NV']?>" placeholder="Mã nhân viên" name="MA_NV">
            </div>
            <div class="form-group">
                <label for="">Tên nhân viên</label>
                <input type="text" class="form-control" value="<?=$row['TEN_NV']?>" placeholder="Tên nhân viên" name="TEN_NV">
            </div>  
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" class="form-control" value="<?=$row['SDT']?>" placeholder="Số điện thoại" name="SDT">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" value="<?=$row['EMAIL']?>" placeholder="Email" name="EMAIL">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" class="form-control" value="<?=$row['PASSWORD']?>" placeholder="Mật khẩu" name="PASSWORD">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" value="<?=$row['ADDRESS']?>" placeholder="Địa chỉ" name="ADDRESS">
            </div>
             
            <button name="submit" type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
<?php
    include_once 'views/admin/layout/footer.php';
?>