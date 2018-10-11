  <div class="container">
    <h3 align="center">FASHE MOBILE</h3>
    <h3 align="center">THÊM MỚI NHÂN VIÊN</h3>
    <hr>
        <form action="?mod=employee&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã nhân viên</label>
                <input type="text" class="form-control" id="" placeholder="Mã nhân viên" name="MA_NV">
            </div>
            <div class="form-group">
                <label for="">Tên nhân viên</label>
                <input type="text" class="form-control" id="" placeholder="Tên nhân viên" name="TEN_NV">
            </div>  
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" class="form-control" id="" placeholder="Số điện thoại" name="SDT">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="Email" name="EMAIL">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" class="form-control" id="" placeholder="Mật khẩu" name="PASSWORD">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="" placeholder="Địa chỉ" name="ADDRESS">
            </div>

            <div class="form-group">
                <label>Quyền hạn</label>
                <select class="form-control" name="ROLE">
                    <option value="1">Quản trị</option>
                    <option value="0">Nhân viên</option>
                </select> 
            </div>
             
            <button name="submit" type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>