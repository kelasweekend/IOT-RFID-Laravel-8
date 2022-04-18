@extends('layouts.admin.master')

@section('title')
          Dashboard Admin
@endsection

@section('content')
          <div class="main-wrapper">
                    <div class="row">
                              <div class="col-md-12 col-lg-8">
                                        <div class="card table-widget shadow-sm">
                                                  <div class="card-body">
                                                            <h5 class="card-title">Recent Orders</h5>
                                                            <div class="table-responsive">
                                                                      <table class="table">
                                                                                <thead>
                                                                                          <tr>
                                                                                                    <th scope="col">Customer</th>
                                                                                                    <th scope="col">Product</th>
                                                                                                    <th scope="col">Invoice</th>
                                                                                                    <th scope="col">Price</th>
                                                                                                    <th scope="col">Status</th>
                                                                                          </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe
                                                                                                    </th>
                                                                                                    <td>Modern</td>
                                                                                                    <td>#53327</td>
                                                                                                    <td>$20</td>
                                                                                                    <td><span class="badge bg-info">Shipped</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe
                                                                                                    </th>
                                                                                                    <td>Modern</td>
                                                                                                    <td>#53327</td>
                                                                                                    <td>$20</td>
                                                                                                    <td><span class="badge bg-info">Shipped</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe
                                                                                                    </th>
                                                                                                    <td>Alpha</td>
                                                                                                    <td>#13328</td>
                                                                                                    <td>$25</td>
                                                                                                    <td><span class="badge bg-success">Paid</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe
                                                                                                    </th>
                                                                                                    <td>Lime</td>
                                                                                                    <td>#35313</td>
                                                                                                    <td>$20</td>
                                                                                                    <td><span class="badge bg-danger">Pending</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe
                                                                                                    </th>
                                                                                                    <td>Circl Admin</td>
                                                                                                    <td>#73423</td>
                                                                                                    <td>$23</td>
                                                                                                    <td><span class="badge bg-primary">Shipped</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Nina Doe
                                                                                                    </th>
                                                                                                    <td>Space</td>
                                                                                                    <td>#54773</td>
                                                                                                    <td>$20</td>
                                                                                                    <td><span class="badge bg-success">Paid</span></td>
                                                                                          </tr>
                                                                                </tbody>
                                                                      </table>
                                                            </div>
                                                  </div>
                                        </div>
                              </div>

                              <div class="col-md-12 col-lg-4">
                                        <div class="card shadow-sm p-4 table-widget">
                                                  <img src="{{ asset('theme/images/top-up.svg') }}" alt="" class="w-100">
                                                  <p class="card-description mb-3 mt-4">Layanan Top Up Debit untuk mengisi saldo agar bisa bertransaksi kapanpun</p>
                                                  <form id="form">
                                                            <div class="input-group flex-nowrap">
                                                                      <span class="input-group-text" id="addon-wrapping">UID</span>
                                                                      <input type="text" class="form-control" readonly placeholder="34SDxxx">
                                                            </div>
                                                            <div class="input-group flex-nowrap mt-3">
                                                                      <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                      <input type="number" id="saldo" name="saldo" class="form-control" placeholder="Masukan Saldo">
                                                            </div>
                                                            <button type="button" class="btn btn-primary mt-3 shadow-sm topup w-100">Submit</button>
                                                  </form>
                                        </div>
                              </div>
                    </div>
          </div>
@endsection

@section('js-tambahan')
          <script type="text/javascript">
                    $(document).ready(function() {
                              $('.topup').click(function() {
                                        var text_confirm = "Apakah Kamu anda Top Sebesar : " + $('#saldo').val();
                                        Swal.fire({
                                                  title: 'Are you sure?',
                                                  text: text_confirm,
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#3085d6',
                                                  cancelButtonColor: '#d33',
                                                  confirmButtonText: 'TopUp Segera'
                                        }).then((result) => {
                                                  if (result.isConfirmed) {
                                                            $("#form")[0].reset();
                                                            Swal.fire(
                                                                      'Thank You !',
                                                                      'Saldo Berhasil di Tambahkan',
                                                                      'success'
                                                            )
                                                  }
                                        })
                              });
                    });
          </script>
@endsection
