<?php require_once('../include/head.php'); ?>
<?php require_once('../include/nav.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card" style="max-width: 1000px; margin: auto;">
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <li class="d-flex mb-4 pb-1">
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
              <h6 class="mb-0">Fake Bill Chuyển Tiền: <b style="color:#00e3cc;">MB Bank</b>
                </h6>
              </div>
            </div>
          </li>
          <form id="td-mbbank" method="POST">
            <input name="forbank" value="mbbank" hidden="">
            <div id="namegui" class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Tên của bạn</label>
              <div class="col-sm-9">
                <input type="text" id="name_gui" name="name_gui" class="form-control" required placeholder="Tên người chuyển">
              </div>
            </div>
            <div id="stkgui" class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">STK của bạn</label>
              <div class="col-sm-9">
                <input type="text" id="stk_gui" name="stk_gui" class="form-control" required placeholder="Số tài khoản người chuyển">
              </div>
            </div>
            <div id="bank1" class="row mb-3">
            <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Tên ngân hàng người nhận</label>
              <div class="col-sm-9">
                <input required="" id="bank" name="bank" class="form-control" onchange="chonBank()">
                  <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://trongthao.tech/api/nganhang',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$jsonData = curl_exec($curl);

curl_close($curl);
$data = json_decode($jsonData, true);

$options = '';
foreach ($data['data'] as $item) {
    $options .= '<option ant="'.$item['shortName'].'" int="'.$item['code'].'" value="' . $item['name'] . '">' . $item['shortName'] . '</option>';
}

echo $options;
?>
                </select>
              </div>
            </div>
            <script>
              function chonBank() {
                var selectElement = document.getElementById("bank");
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var intValues = selectedOption.getAttribute("int");
                document.getElementById('code').value = intValues;
                var selectElement = document.getElementById("bank");
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var intValues = selectedOption.getAttribute("ant");
                document.getElementById('code1').value = intValues;
              }
            </script>
            <input id="code1" value="Vietinbank" name="code1" hidden="">
            <input id="code" value="ICB" name="code" hidden="">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">STK nhận</label>
              <div class="col-sm-9">
                <input type="number" id="stk" name="stk" required="" class="form-control" placeholder="Số tài khoản người nhận">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Tên người nhận</label>
              <div class="col-sm-9">
                <input type="text" id="name_nhan" name="name_nhan" required="" class="form-control" placeholder="Tên người nhận">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Số tiền chuyển</label>
              <div class="col-sm-9">
                <input type="number" id="amount" name="amount" required="" class="form-control" placeholder="Ví dụ: 100000">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Nội dung chuyển khoản</label>
              <div class="col-sm-9">
                <textarea type="text" id="noidung" name="noidung" required class="form-control" placeholder="Nhập nội dung CK"></textarea>
              </div>
            </div>
            <div class="row mb-3" id="magiaodichx">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Mã giao dịch</label>
              <div class="col-sm-9">
                <input type="text" id="magiaodich" name="magiaodich" class="form-control" placeholder="Mã giao dịch" value="FT22<?php echo(rand(10000000,100000000));?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Thời gian chuyển tiền</label>
              <div class="col-sm-9">
                <input type="text" id="time1" name="time1" required="" class="form-control" placeholder="Time" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');echo date('H:i:s, d/m/Y');?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Hình thức chuyển</label>
              <div class="col-sm-9">
                <input type="text" id="hinhthucck" name="hinhthucck" required="" class="form-control" placeholder="Trong MB" value="Trong MB">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="thanhdieudeptrai">Giờ chuyển khoản</label>
              <div class="col-sm-9">
                <input type="text" id="thoigianhientai" name="thoigianhientai" required="" class="form-control" placeholder="Giờ chuyển khoản" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');echo date('H:i');?>">
              </div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary waves-effect waves-light">Tạo bill</button>
            </div>
          </form>
        </div>
        <div id="creator-success"></div>
        <div id="download-img"></div>
        <div id="done-fakebill-td"></div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#td-mbbank').submit(function(e) {
        e.preventDefault();
        var submitButton = $(this).find('button[type="submit"]');
        showToastrNotification('info', 'Đang tạo bill, đợi xíu nhen...', 'Thông báo');
        submitButton.html('Đang fake bill...').prop('disabled', true);
        var randomDelay = Math.floor(Math.random() * (2000 - 1000 + 1)) + 1000;
        setTimeout(function() {
            var formData = $('#td-mbbank').serialize();
            $.ajax({
                type: 'POST',
                url: 'ajax/mb-bank.php',
                data: formData,
                success: function(response) {
                    $('#creator-success').html('');
                    $('#download-img').html('');
                    $('#done-fakebill-td').html('');
                    $('#creator-success').html('<br/><p class="alert alert-success mb-3">Đã tạo ảnh fake-bill thành công!</p>');
                    $('#download-img').html('<a href="data:image/jpeg;base64,' + response +'" download="bill-mbbank.jpg" class="btn btn-success">Tải Bill Xuống</a><br/><br/>');
                    var image = $('<img>').attr('src', 'data:image/jpeg;base64,' + response);
                    $('#done-fakebill-td').append(image);
                    showToastrNotification('success', 'Tạo thành công', 'Thông báo');
                    submitButton.html('thành công, nhấn để tạo lại').prop('disabled', false);
                },
                error: function(error) {
                    console.log(error);
                    showToastrNotification('error', 'Tạo thất bại...', 'Thông báo');
                    submitButton.html('Tạo bill (miễn phí)').prop('disabled', false);
                }
            });
        }, randomDelay);
    });
});
</script>
<?php require_once('../include/foot.php'); ?>