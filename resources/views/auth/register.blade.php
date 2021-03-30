@extends('layouts.app')

@section('content')

<style type="text/css">
  .select-location {
    border: 1px solid #ccc;
    padding: 6px;
    width: 102px;
    background-color: #efefef;
  }
</style>
<div style=" background-color:#fff; padding:0px; width:100%;float: right;margin-top: 10px;">
  <div class="title-gf">
    Đăng ký tài khoản
  </div>
  <div class="content-gf">
    <form class="new_user" id="new_user" method="POST" action="{{ route('register') }}">
      @csrf
      <div id="notice" style="padding-left:155px"></div>
      <table>
        <tr>
          <td>
            Họ tên<sup>*</sup>
          </td>
          <td>
            <input id="name" type="text" class="required @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="off red" id="lb_user_fullname">Hãy nhập họ tên của bạn</label>
          </td>
        </tr>
        <tr>
          <td>
            Email<sup>*</sup>
          </td>
          <td>
            <input id="email" type="email" class="required @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="off red" id="lb_user_email">Vui lòng nhập email</label>
          </td>
        </tr>
        <tr>
          <td>
            Mật khẩu<sup>*</sup>
          </td>
          <td>
            <input id="password" type="password" class="required @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="off red" id="lb_user_password">Nhập mật khẩu</label>
          </td>
        </tr>
        <tr>
          <td>
            Nhập lại mật khẩu<sup>*</sup>
          </td>
          <td>
            <input id="password-confirm" type="password" class="required" name="password_confirmation" required autocomplete="new-password"><br>
            <label class="off red" id="lb_user_password_confirmation">Hãy nhập lại mật khẩu</label>
          </td>
        </tr>

        <!-- <tr>
          <td>Điện thoại<sup>*</sup></td>
          <td>
            <input id="phone-number" type="tel" class="required @error('phone-number') is-invalid @enderror" name="phone-number" value="{{ old('phone-number') }}" required autocomplete="phone-number"><br>
            @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="off red" id="lb_user_phone">Nhập số Điện thoại</label>
          </td>
        </tr> -->
        <!-- <tr>
          <td>
            <div style="position:relative;">
              Tỉnh/thành phố<sup>*</sup>
            </div>
          </td>
          <td>
            <select name="profile[location1]" id="profile-location1" class="select-location">
              <option value="0">Chọn tỉnh/ thành phố</option>
              <option value="1">Hà Nội</option>
              <option value="50">Hồ Chí Minh</option>
              <option value="2">Hà Giang</option>
              <option value="3">Cao Bằng</option>
              <option value="4">Bắc Kạn</option>
              <option value="5">Tuyên Quang</option>
              <option value="6">Lào Cai</option>
              <option value="7">€iện Biên</option>
              <option value="8">Lai Châu</option>
              <option value="9">Sơn La</option>
              <option value="10">Yên Bái</option>
              <option value="11">Hoà Bình</option>
              <option value="12">Thái Nguyên</option>
              <option value="13">Lạng Sơn</option>
              <option value="14">Quảng Ninh</option>
              <option value="15">Bắc Giang</option>
              <option value="16">Phú Thọ</option>
              <option value="17">Vĩnh Phúc</option>
              <option value="18">Bắc Ninh</option>
              <option value="19">Hải Dương</option>
              <option value="20">Hải Phòng</option>
              <option value="21">Hưng Yên</option>
              <option value="22">Thái Bình</option>
              <option value="23">Hà Nam</option>
              <option value="24">Nam €ịnh</option>
              <option value="25">Ninh Bình</option>
              <option value="26">Thanh Hóa</option>
              <option value="27">Nghệ An</option>
              <option value="28">Hà Tĩnh</option>
              <option value="29">Quảng Bình</option>
              <option value="30">Quảng Trị</option>
              <option value="31">Thừa Thiên Huế</option>
              <option value="32">€à Nẵng</option>
              <option value="33">Quảng Nam</option>
              <option value="34">Quảng Ngãi</option>
              <option value="35">Bình €ịnh</option>
              <option value="36">Phú Yên</option>
              <option value="37">Khánh Hòa</option>
              <option value="38">Ninh Thuận</option>
              <option value="39">Bình Thuận</option>
              <option value="40">Kon Tum</option>
              <option value="41">Gia Lai</option>
              <option value="42">€ắk Lắk</option>
              <option value="43">€ắk Nông</option>
              <option value="44">Lâm €ồng</option>
              <option value="45">Bình Phước</option>
              <option value="46">Tây Ninh</option>
              <option value="47">Bình Dương</option>
              <option value="48">€ồng Nai</option>
              <option value="49">Bà Rịa - Vũng Tàu</option>
              <option value="51">Long An</option>
              <option value="52">Tiền Giang</option>
              <option value="53">Bến Tre</option>
              <option value="54">Trà Vinh</option>
              <option value="55">Vĩnh Long</option>
              <option value="56">€ồng Tháp</option>
              <option value="57">An Giang</option>
              <option value="58">Kiên Giang</option>
              <option value="59">Cần Thơ</option>
              <option value="60">Hậu Giang</option>
              <option value="61">Sóc Trăng</option>
              <option value="62">Bạc Liêu</option>
              <option value="63">Cà Mau</option>
            </select><br>
            @error('profile-location1')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="off red" id="lb_profile-location1">Hãy chọn tỉnh/thành phố</label>
          </td>
        </tr>
        <tr>
          <td>
            Quận/huyện<sup>*</sup>
          </td>
          <td>
            <div id="location2">

              <select name="profile[location2]" class="select-location" id="profile-location2">
                <option selected="selected" value="0">--</option>
              </select>
            </div>
            <label class="off red" id="lb_profile-location2">Hãy chọn quận/huyện</label>
          </td>
        </tr>
        <tr>
          <td>
            Phường/xã<sup>*</sup>
          </td>
          <td>
            <div id="location3">
              <select name="profile[location3]" class="select-location" id="profile-location3">
                <option selected="selected" value="0">--</option>
              </select>
            </div>
            <label class="off red" id="lb_profile-location3">Hãy chọn phường/xã</label>
          </td>
        </tr> -->
        <!-- <tr>
          <td>Số nhà và tên đường<sup>*</sup> </td>
          <td>
            <input id="address" type="text" class="required @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"><br>
            <label class="off red" id="lb_profile_address">Vui lòng nhập số nhà, tên €ường</label>
          </td>
        </tr> -->
      </table>
      <table>
        <tr>
          <td></td>
          <td>
            <div class="cap-orderonline">
              <input type="submit" value="Tạo tài khoản" class="btn btn-primary" />
            </div>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(".select-location").blur(function() {
      var id = $(this).val();
      if (parseInt(id) > 0) {
        $(this).removeClass('border-red');
        var dataid = $(this).attr('id');
        $("#lb_" + dataid).hide();
      }
    });
    $("input.required").blur(function() {
      if ($(this).val() != "") {
        $(this).removeClass('border-red');
        $("#lb_" + $(this).attr('id')).hide();
      }
    });
    $("#profile-location1").change(function() {
      var id = $(this).val();
      if (parseInt(id) > 0) {
        $.ajax({
          url: "/locations/location?id=" + id,
          dataType: "script"
        });
      } else {
        $("#location2").html('<select name="location2" class="select-location" id="profile-location2"><option selected="selected" value="0">--</option></select>');
      }
      $("#location3").html('<select name="location3" class="select-location" id="profile-location3"><option selected="selected" value="0">--</option></select>');
    });
    $("#profile-location2").change(function() {
      var id = $(this).val();
      $.ajax({
        url: "/locations/location?id=" + id,
        dataType: "script"
      });

    });
    $("#new_user").submit(function(event) {
      var capt_value = $(this).find("#captcha_valid").val().toUpperCase();
      var ready = 0;
      $(this).find("input.required").each(function() {
        if ($(this).val() == "") {
          $(this).addClass('border-red');
          $("#lb_" + $(this).attr('id')).show();
          ready--;
        } else {
          $(this).removeClass('border-red');
          $("#lb_" + $(this).attr('id')).hide();
          ready++;
        }
      });
      $(this).find("select.select-location").each(function() {
        if ($(this).val() == "0") {
          var id = $(this).attr('id');
          $("#lb_" + id).show();
          $(this).addClass('border-red');
          ready--;
        } else {
          var id = $(this).attr('id');
          $("#lb_" + id).hide();
          $(this).removeClass('border-red');

          ready++;
        }
      });
      if (trim($(this).find("#input_captcha_valid").val()).toUpperCase() != trim(capt_value)) {
        $("#lb_capcha").show();
        ready--;
      } else {
        $("#lb_capcha").hide();
        ready++;
      }
      if (ready == 10) {
        return true;
      } else {
        event.preventDefault();
        return false;
      }
    });
  });
</script>
<style>
  .select-location {
    width: 312px;
    padding: 5px 0
  }
</style>
@endsection