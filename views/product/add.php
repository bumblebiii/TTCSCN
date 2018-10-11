<?php 
    include_once 'views/admin/layout/header.php';
 ?>
 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item ">Quản lý sản phẩm</li>
            <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
          </ol>
    <div class="container">
    <h3 align="center">FASHE MOBILE</h3>
    <h3 align="center">THÊM MỚI SẢN PHẨM</h3>
    <hr>
        <form action="?mod=product&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Mã sản phẩm" id="MA_SP" name="MA_SP">
            </div>
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên sản phẩm" id="TEN_SP" name="TEN_SP">
            </div>  
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào số lượng" id="SO_LUONG" name="SO_LUONG">
            </div>
            <!-- <div class="form-group">
                <label for="">Giá nhập</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào giá nhập" id="GIA_NHAP" name="GIA_NHAP">
            </div> -->
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào giá bán" id="GIA_BAN" name="GIA_BAN">
            </div>
             <div class="form-group">
                <label for="">Ảnh Sản phẩm</label>
                <input type="file" class="form-control" id="ANH_SP" name="ANH[]" multiple>
            </div>
            <div class="form-group">
                <label for="">Loại Sản phẩm</label>
                <!-- <input type="text" class="form-control" id="" placeholder="Nhập vào mã loại sản phẩm" name="MA_LOAI_SP"> -->
                <select class="form-control" name="MA_LOAI_SP">
                    <?php 
                        foreach ($LSP as $row) {
                    ?>
                            <option  value="<?=$row['MA_LOAI_SP']?>"><?=$row['TEN_LOAI_SP']?></option>
                    <?php
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nhà sản xuất</label>
                <!-- <input type="text" class="form-control" id="" placeholder="Nhập vào mã loại sản phẩm" name="MA_LOAI_SP"> -->
                <select class="form-control" name="MA_NSX">
                    <?php 
                        foreach ($NSX as $row1) {
                    ?>
                            <option  value="<?=$row1['MA_NSX']?>"><?=$row1['NSX']?></option>
                    <?php
                        } 
                    ?>
                </select>
            </div>
            
            <button name="submit" type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
<?php 
    include_once 'views/admin/layout/footer.php';
 ?>