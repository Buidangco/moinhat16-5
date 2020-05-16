 <div class="modal-dialog" role="document">
                                <div class="modal-content" style="margin-top: 80%;margin-left: 112%;opacity: 0.9;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" onclick="tatmodal()">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table table-bordered">
                                       <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình ảnh</th>
                                                <th>Mã khách hàng</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Tổng giá</th>
                                            </tr>
                                        </thead>
                                      @foreach($data1 as $row)
                                      <tr class="active">
                                        <td>{{$i++}}</td>
                                        <td><img style="width: 50px;height: 50px" src="{{url('storage/photos/1')}}/{{$row->image}}" alt="user" class="rounded" width="45"></td>
                                           <td>{{$row->maKh}}</td>
                                          <td>{{$row->name}}</td>
                                          <td>{{$row->soluong}}</td>
                                          <td>{{$row->Gia}}</td>
                                          <!-- <td>thehalftheart@mail.com</td>
                                          <td>192 Hầm tử</td> -->
                                      </tr>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>