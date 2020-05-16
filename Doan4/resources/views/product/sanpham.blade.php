       @extends('layouts.dash')
       @section('section')
  
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="text-center">
                         <a href="/product/add" class="btn btn-default btn-rounded mb-4"  >Thêm sản phẩm</a>

                        </div>
                        <div class="text-center"><input id="nameprice" type="text" placeholder="Search here...">
                                    <button onclick="timkiemsanpham()"><i class="fa fa-search"></i></button></div>
                                    <div style="opacity:0;" id="nho"></div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div style="margin-left: 105px;" class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">STT</th>
                                                        <th class="border-0">Hình Ảnh</th>
                                                        <th class="border-0">Tên SP</th>
                                                        <th class="border-0">Giá</th>      
                                                        <th class="border-0">Sửa </th>
                                                        <th class="border-0">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="themvao">
                                                    
                                                	@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="{{url('storage/photos/1')}}/{{$row->image}}" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td style="opacity: 0;display: none;"><input type="text"  id="code" value="{{$row->code}}" name=""></td>
                                                        <td>{{$row->name}}</td> 
                                                        <td><span>{{number_format($row->price)}}&nbsp;₫ </span></td>
                                                        <td>
                                                          <a href="{{route('/product/edit',$row->id)}}" class="btn btn-default btn-rounded mb-4"><i class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td><a onclick="deletesanpham('{{$row->id}}')" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            Tổng số trang{!!$data1->lastPage()!!}
                                        <nav style="    text-align: right;" aria-label="Page navigation example">
                                            <ul class="pagination">
                                            @if($data1->currentPage()!=1)
                                             <li class="page-item"><a class="page-link" href="{!!$data1->url($data1->currentPage()-1)!!}">Previous</a></li>
                                             @endif
                                             @for($i=1;$i<=$data1->lastPage();$i=$i+1)
                                            <li class="page-item {!!($data1->currentPage()==$i) ? 'active':''!!}"><a class="page-link" href="{!!str_replace('/?','/?',$data1->url($i))!!}">{!!$i!!}</a></li>
                                            @endfor
                                            @if($data1->currentPage()!=$data1->lastPage())
                                            <li class="page-item"><a class="page-link" href="{!!$data1->url($data1->currentPage()+1)!!}">Next</a></li>
                                            @endif
                                            </ul>
                                        </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
       <script type="text/javascript">
           function deletesanpham(id)
           {
            if(confirm("Bạn có muốn xóa sản phẩm này không?")){
                $.ajax({
                    url:'/product1/delete',
                    data:{
                        'id':id,
                        '_token':'{{csrf_token()}}',
                    },
                    type:"post",
                    error:function(xhr,status,errorThrow){
                        alert(errorThrow);
                    },
                    success:function(data){
                        alert("Xóa thành công");
                       location.reload();
                    }
                })
            }
           }

           function timkiemsanpham()
           {
            let nameprice= $('#nameprice').val();
          let code=$("#code").val();
           let code1 =$('#nho').html(code);
           let code2=$('#nho').text();
         $.ajax({
          type:'GET',
          url:'/danhsachtimkiem1/'+nameprice+'/'+code2,
         }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
           }
       </script>
        @stop()