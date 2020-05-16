@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$row->makh}}</td>
                                                        <td>{{$row->gia}}</td>
                                                        <td>{{$row->ngayban}}</td>
                                                        <td>            
                                                        <button id="xacnhan" class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="xacnhanda('{{$row->mahoadon}}')"> {{$row->xacnhan}}</button>
<!--                                                            <div class="dropdown-menu" id="hoanthanh">
                                                             <a id="daduyet-{{$row->mahoadon}}" class="dropdown-item" onclick="xacnhanda('{{$row->mahoadon}}')">Đã duyệt</a>
                                                           </div> -->
                                                    </td>
                                                    <!-- <td style="display: flex;color: red">            
                                                       Xét duyệt <input style="    display: block;margin-right: 12px;margin-left: 7px;" type="radio" name="phai" value="Nam" checked> Chưa duyệt <input  style="    display: block;    margin-left: 7px;" type="radio" name="phai" value="Nữ">  
                                                    
                                                    </td> -->
                                                        <td>
                                                          <a onclick="view('{{$row->mahoadon}}')" class="btn btn-default btn-rounded mb-4"><i  class="fa fa-eye"></i></a>    
                                                      </td>
                                                        <td>
                                                          <a href="{{route('/product/edit',$row->mahoadon)}}" class="btn btn-default btn-rounded mb-4"><i class="fas fa-edit"></i></a>
                                                      </td>
                                 <!--                        <td><a onclick="deletesanpham('{{$row->mahoadon}}')" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td> -->
                                                    </tr>
                                                    @endforeach