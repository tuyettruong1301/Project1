<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #F5ECCE">
    <div class="collapse navbar-collapse col-md-offset-1" id="bs-example-navbar-collapse-1">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <form action="{{route('tim-kiem')}}" style="margin-top: 8px;">
                <input type="text" name= "timkiem" id="timkiem" class="form-control" placeholder="nhap thong tin tim kiem" style="width: 70%;float: left">
                <button type="submit" class="btn btn-default" style="margin-left: 5px">Search</button>
            </form>
            <div style="position: absolute; left: 17px; background-color: white; width: 65%;top: 42px;z-index: 9; display: none;" id="divtimkiem">
                <ul style="list-style: none; padding: 10px" id="dsketqua">
                </ul>
            </div>
        </div>
        
        <ul class="nav navbar-nav pull-right">
            @if(Auth::check())
                @if(Auth::User()->anhdaidien != "")
                    <li><p style="margin-top: 5px"><a href="{{route('thong-tin-ca-nhan')}}"> <img src="upload/{{Auth::User()->anhdaidien}}" width="50" height="45">  {{Auth::User()->hoten}}</a></p></li>
                @else
                    <li><a href="{{route('thong-tin-ca-nhan')}}"><i class="fa fa-user"></i> {{Auth::User()->hoten}} </a></li>
                @endif
                @if(Auth::User()->quyen == 2)
                    <li><a href="{{route('trang-chu-hdv')}}">Quan ly tour</a></li>
                @elseif(Auth::User()->quyen == 3)
                    <li><a href="{{route('trang-chu-admin')}}">Trang quan ly</a></li>
                @elseif(Auth::User()->quyen == 1)
                    <li><a href="{{route('lich-su')}}"><i class="glyphicon glyphicon-shopping-cart"></i> Lich su dat tour</a></li>
                @endif
                <li><a href="{{ route('dang-xuat')}}">Đăng xuất</a></li>
            @else
                <li><a href="" data-toggle="modal" data-target="#DangKyKhach">Đăng ký Khách</a></li>
                <li><a href="" data-toggle="modal" data-target="#DangKyHDV">Đăng ký HDV</a></li>
                <li><a href="" data-toggle="modal" data-target="#DangNhap">Đăng nhập</a></li>
            @endif
        </ul>
    </div>
</nav>


