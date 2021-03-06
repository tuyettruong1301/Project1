@extends('hdv.layout_hdv.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sach
                    <small>Tour cua toi</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 100px; width: 40%" align="center">
                    {{session('thongbao')}}
                </div>
                @endif
                @if(session('delImage'))
                <div class="alert alert-success" style="margin-top: 100px; width: 40%" align="center">
                    {{session('delImage')}}
                </div>
                @endif
                @if(session('errorImage'))
                <div class="alert alert-danger" style="margin-top: 100px; width: 40%" align="center">
                    {{session('errorImage')}}
                </div>
                @endif

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Ten tour</th>
                        <th>Dia diem</th>
                        <th>So khach max</th>
                        <th>Gia tour</th>
                        <th>Hinh anh</th>
                        <th>Hinh anh khac</th>
                        <th>Chi tiet</th>
                        <th>Sua</th>
                        <th>Xoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tour as $dst)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dst->tentour}}</td>
                            <td>{{$dst->diadiem->tendiadiem}}</td>
                            <td>{{$dst->sokhachmax}}</td>
                            <td>{{number_format($dst->giatour)}}</td>                            
                            @if(strlen($dst->hinhanh)>0)  
                                <td><img src="upload/{{$dst->hinhanh}}" width="60" height="60"></td>
                            @else
                                <td></td>
                            @endif
                            <td width="90px">
                                @if(strlen($dst->hinhanh)>0)
                                @foreach($dst->imagetour as $imgtour)
                                    <div style="margin: 5px">
                                        <img src="upload/{{$imgtour->image}}" width="45" height="45">
                                        <a href="{{route('xoa-anh',$imgtour->id)}}" onclick=" return xoaanh()"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                @endforeach
                                    <div style="margin-top: 20%"><a href="{{route('them-anh-tour',$dst->id)}}"><i class="glyphicon glyphicon-plus"></i></a></div>
                                @endif
                            </td>
                            <td><a href="{{route('chi-tiet',$dst->id)}}"> Chi tiet</a></td>
                            <?php $flag = true ?>
                            @foreach($dst->bill as $dsb)
                                @if($dsb->tinhtrangdon == 0|| $dsb->tinhtrangdon == 1)
                                    <td></td>
                                    <td></td>
                                    <?php $flag = false ?>
                                    @break
                                @endif
                            @endforeach
                            @if($flag == true)
                                <td class="center"><a href="{{route('tour.edit',$dst->id)}}">
                                    <button type="submit"><i class="glyphicon glyphicon-pencil"></i></button>
                                </a></td>
                                <td class="center">
                                    <form action="{{route('tour.destroy',$dst->id)}}" method="POST">
                                        @method('delete')
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" onclick="return xoatour()"><i class="fa fa-trash-o  fa-fw"></i></button>
                                    </form>
                                    <!-- <a href="{{route('tour.destroy',$dst->id)}}" onclick="return xoatour()"> Delete</a> -->
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row" style="text-align: center">
                {{$tour->links()}}
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
    function xoaanh(){
        return confirm("Ban chac chan xoa anh chu?")
    }
    function xoatour(){
        return confirm("Ban chac chan xoa tour nay chu?")
    }
</script>
@endsection