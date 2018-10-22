<?php 
	include_once 'views/admin/layout/header.php';
?>
	

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Bảng điều khiển</a>
            </li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?=count($data3)?> Orders</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?mod=admin&act=listBill">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?=count($data2)?> Products</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?mod=admin&act=product">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><?=count($data)?> Customers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?mod=admin&act=customer">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?=count($data1)?> Employees</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?mod=admin&act=employee">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <?php 
            if ($_SESSION['user']['ROLE']==1) {
          ?>
             <div class="row">
                <div class="col-sm-12">
                  <form action="?mod=admin&act=index" method="POST">
                    <div class="form-group">
                      <label>Chọn tháng: </label>
                      <select name="NGAY_BAN">
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                      </select>
                      &ensp;&ensp; &ensp; &ensp;
                      <label>Chọn năm: </label>
                      <select name="NAM_BAN">
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                      </select>
                    </div>
                    <input type="submit" value="Thống kê" name="">
                  </form>
                  <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover" style="text-align: center;">
                          <thead>
                            <td><b>STT</b></td>
                            <td><b>MÃ HÓA ĐƠN</b></td>
                            <td><b>MÃ NHÂN VIÊN</b></td>
                            <td><b>MÃ KHÁCH HÀNG</b></td>
                            <td><b>NGÀY BÁN</b></td>
                            <td><b>TỔNG TIỀN</b></td>
                          </thead>
                          <tbody>
                            <?php
                              $TONG =0;
                              $i=0;
                              foreach ($data6 as $valu6) {
                                $TONG += $valu6['TONG_TIEN'];
                                $i++;
                            ?>
                                <tr>
                                  <td><?=$i?></td>
                                  <td><?=$valu6['MA_HD']?></td>
                                  <td><?=$valu6['MA_NV']?></td>
                                  <td><?=$valu6['MA_KH']?></td>
                                  <td><?=$valu6['NGAY_BAN']?></td>
                                  <td><?=number_format($valu6['TONG_TIEN'])?></td>
                                </tr>
                            <?php
                              }
                            ?>
                              <tr>
                                <td colspan="5"><b>TỔNG DOANH THU </b></td>
                                <td ><b><?= (isset($TONG))? number_format($TONG) : 0;?></b></td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
           ?>

              <!-- Bar Chart Example-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-area"></i>
                  TOP 10 SẢN PHẨM BÁN CHẠY NHẤT THÁNG</div>
                <div class="card-body">
                  <canvas id="myBarChart" width="100%" height="30"></canvas>
                </div>
              </div>
              <!-- Bar Chart Example-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-area"></i>
                  5 SẢN PHẨM CÒN NHIỀU HÀNG TRONG KHO NHẤT</div>
                <div class="card-body">
                  <canvas id="myBarChart1" width="100%" height="30"></canvas>
                </div>
              </div> 
         <div style="display: none;">
            <table >
              <thead>
                <tr>
                  <th>MÃ SP</th>
                  <th>TÊN SP</th>
                  <th>TỔNG SL</th>
                </tr>
              </thead>
              <tbody id="body">
                <?php $i=0;
                 foreach ($data4 as $value4){ 
                  $i++;
                  ?>
                  <tr id="<?=$i?>" data-name="<?=$value4['TEN_SP']?>" data-sum="<?=$value4['TONG']?>">
                    <td><?=$value4['MA_SP']?></td>
                    <td><?=$value4['TEN_SP']?></td>
                    <td><?=$value4['TONG']?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div style="display: none;">
            <table >
              <thead>
                <tr>
                  <th>MÃ SP</th>
                  <th>TÊN SP</th>
                  <th>SỐ LƯỢNG</th>
                </tr>
              </thead>
              <tbody id="body1">
                <?php $i=10;
                 foreach ($data5 as $value5){ 
                  $i++;
                  ?>
                  <tr id="<?=$i?>" data-name1="<?=$value5['TEN_SP']?>" data-sum1="<?=$value5['SO_LUONG']?>">
                    <td><?=$value5['MA_SP']?></td>
                    <td><?=$value5['TEN_SP']?></td>
                    <td><?=$value5['SO_LUONG']?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
<?php
	include_once 'views/admin/layout/footer.php';
 ?>