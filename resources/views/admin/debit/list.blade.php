@extends('layouts.admin.master')

@section('title')
          Debit List Master
@endsection

@section('content')
          <div class="main-wrapper">
                    <div class="row">
                              <div class="col">
                                        <div class="card">
                                                  <div class="card-body">
                                                            <h5 class="card-title mb-3">@yield('title')</h5>
                                                            <p>Berikut List User, Pastikan Role User Sudah di isi dan Check Seluruh User Jika Ada Kegiatan Yang
                                                                      Tidak di inginkan.</p>
                                                            <table id="zero-conf" class="display datatable" style="width:100%">
                                                                      <thead>
                                                                                <tr>
                                                                                          <th>Debit Number</th>
                                                                                          <th>Full Name</th>
                                                                                          <th>Limit</th>
                                                                                          <th>Action</th>
                                                                                </tr>
                                                                      </thead>
                                                                      <tbody>

                                                                      </tbody>
                                                                      <tfoot>
                                                                                <tr>
                                                                                          <th>Debit Number</th>
                                                                                          <th>Full Name</th>
                                                                                          <th>Limit</th>
                                                                                          <th>Action</th>
                                                                                </tr>
                                                                      </tfoot>
                                                            </table>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="pinModel" tabindex="-1" aria-labelledby="pinModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                              <div class="modal-content m-3">
                                        <div class="modal-header">
                                                  <h5 class="modal-title" id="pinModelLabel">Change Pin Debit</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                  <form id="PinForm" name="PinForm" class="form-horizontal">
                                                            <input type="hidden" name="Pin_id" id="Pin_id">
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Debit Card Number</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping">UID</span>
                                                                                <input type="text" name="code" id="code" class="form-control" readonly placeholder="34SDxxx">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Pin Sebelumnya</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock text-muted"></i></span>
                                                                                <input type="password" name="pin_before" id="pin_before" class="form-control" placeholder="*****">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Pin Baru</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock text-muted"></i></span>
                                                                                <input type="password" name="pin_after" id="pin_after" class="form-control" placeholder="*****">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Verifikasi Pin Admin</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock text-muted"></i></span>
                                                                                <input type="password" name="admin" id="admin" class="form-control" placeholder="*****">
                                                                      </div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary mt-3 mb-3 float-end shadow-sm" id="pinBtn">Submit</button>
                                                  </form>
                                        </div>
                              </div>
                    </div>
          </div>

          <div class="modal fade" id="updateModel" tabindex="-1" aria-labelledby="updateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                              <div class="modal-content m-3">
                                        <div class="modal-header">
                                                  <h5 class="modal-title" id="updateModelLabel">Change Debit</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                  <form id="UpdateForm" name="UpdateForm" class="form-horizontal">
                                                            <input type="hidden" name="Update_id" id="Update_id">
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Debit Card Number</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping">UID</span>
                                                                                <input type="text" name="code" id="code" class="form-control" readonly placeholder="34SDxxx">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Masukan Saldo
                                                                                Awal</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                                <input type="number" name="saldo" id="saldo" class="form-control" placeholder="500.000">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Limit
                                                                                Transaksi</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                                <input type="number" name="limit" id="limit" class="form-control" placeholder="100.000">
                                                                      </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Verifikasi Pin Admin</label>
                                                                      <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock text-muted"></i></span>
                                                                                <input type="password" name="admin" id="admin" class="form-control" placeholder="*****">
                                                                      </div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary mt-3 mb-3 float-end" id="updateBtn">Submit</button>
                                                  </form>
                                        </div>
                              </div>
                    </div>
          </div>
@endsection

@section('css-tambahan')
          <link href="{{ asset('theme/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('js-tambahan')
          <script src="{{ asset('theme/plugins/DataTables/datatables.min.js') }}"></script>
          {{-- <script src="{{ asset('theme/js/pages/datatables.js')}}"></script> --}}
          <script type="text/javascript">
                    $(function() {
                              $.ajaxSetup({
                                        headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                              });
                              var table = $('.datatable').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        ajax: "{{ route('admin.debit.list') }}",
                                        pageLength: 5,
                                        lengthMenu: [5, 10, 20, 50, 100, 200, 500],
                                        responsive: true,
                                        lengthChange: true,
                                        autoWidth: true,
                                        columns: [{
                                                            data: 'code',
                                                            name: 'code'
                                                  },
                                                  {
                                                            data: 'name',
                                                            name: 'name'
                                                  },
                                                  {
                                                            data: 'limit',
                                                            name: 'limit'
                                                  },
                                                  {
                                                            data: 'action',
                                                            name: 'action',
                                                            orderable: true,
                                                            searchable: true
                                                  },
                                        ]
                              });

                              //   get edit data
                              $('body').on('click', '.editItem', function() {
                                        var Item_id = $(this).data('id');
                                        var url = $(this).data('url');
                                        $('.tombol').html("Save Change");
                                        $.get(url, function(data) {
                                                  console.log(data);
                                                  if (data.error) {
                                                            Swal.fire({
                                                                      icon: "error",
                                                                      title: "Mohon Maaf !",
                                                                      text: data.error
                                                            });
                                                  } else {
                                                            $('#updateModel').modal('show');
                                                            $('#Update_id').val(data.id);
                                                            $('input[name=code]').val(data.code);
                                                            $('input[name=saldo]').val(data.amount);
                                                            $('input[name=limit]').val(data.limit);
                                                  }
                                        })
                              });

                              //   change pin debit
                              $('body').on('click', '.pinItem', function() {
                                        var Item_id = $(this).data('id');
                                        var url = $(this).data('url');
                                        $('.tombol').html("Save Change");
                                        $.get(url, function(data) {
                                                  console.log(data);
                                                  if (data.error) {
                                                            Swal.fire({
                                                                      icon: "error",
                                                                      title: "Mohon Maaf !",
                                                                      text: data.error
                                                            });
                                                  } else {
                                                            $('#pinModel').modal('show');
                                                            $('#Pin_id').val(data.id);
                                                            $('input[name=code]').val(data.code);
                                                  }
                                        })
                              });

                              //   edt pin
                              $('#pinBtn').click(function(e) {
                                        e.preventDefault();

                                        var Pin_id = $('input[name=Pin_id]').val();
                                        $.ajax({
                                                  data: $('#PinForm').serialize(),
                                                  url: '/admin/debit/list/' + Pin_id + '/pin',
                                                  type: "POST",
                                                  dataType: 'json',
                                                  success: function(response) {
                                                            if (response.success) {
                                                                      Swal.fire({
                                                                                icon: "success",
                                                                                title: "Selamat",
                                                                                text: response
                                                                                          .success
                                                                      });
                                                                      $('#PinForm').trigger("reset");
                                                                      $('#pinModel').modal('hide');
                                                                      table.draw();
                                                            } else {
                                                                      Swal.fire({
                                                                                icon: "error",
                                                                                title: "Mohon Maaf !",
                                                                                text: response.error
                                                                      });
                                                            }
                                                  },
                                                  error: function() {
                                                            Swal.fire({
                                                                      icon: "error",
                                                                      title: "Oops...",
                                                                      text: "Something went wrong!"
                                                            });
                                                  }
                                        });
                              });

                              //   edit data
                              $('#updateBtn').click(function(e) {
                                        e.preventDefault();

                                        var Update_id = $('input[name=Update_id]').val();
                                        $.ajax({
                                                  data: $('#UpdateForm').serialize(),
                                                  url: '/admin/debit/list/' + Update_id + '/update',
                                                  type: "POST",
                                                  dataType: 'json',
                                                  success: function(response) {
                                                            if (response.success) {
                                                                      Swal.fire({
                                                                                icon: "success",
                                                                                title: "Selamat",
                                                                                text: response
                                                                                          .success
                                                                      });
                                                                      $('#UpdateForm').trigger("reset");
                                                                      $('#updateModel').modal('hide');
                                                                      table.draw();
                                                            } else {
                                                                      Swal.fire({
                                                                                icon: "error",
                                                                                title: "Mohon Maaf !",
                                                                                text: response.error
                                                                      });
                                                            }
                                                  },
                                                  error: function() {
                                                            Swal.fire({
                                                                      icon: "error",
                                                                      title: "Oops...",
                                                                      text: "Something went wrong!"
                                                            });
                                                  }
                                        });
                              });

                              //   delete data
                              $('body').on('click', '.deleteItem', function() {
                                        var Item_id = $(this).data("id");
                                        var url = $(this).data("url");
                                        Swal.fire({
                                                  title: 'Apakah Anda Yakin ?',
                                                  text: "Anda Akan Menghapus data Ini !",
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#3085d6',
                                                  cancelButtonColor: '#d33',
                                                  confirmButtonText: 'Hapus Segera'
                                        }).then((result) => {
                                                  if (result.isConfirmed) {
                                                            $.ajax({
                                                                      type: "DELETE",
                                                                      url: url,
                                                                      success: function(response) {
                                                                                if (response
                                                                                          .success
                                                                                ) {
                                                                                          Swal.fire({
                                                                                                    icon: "success",
                                                                                                    title: "Selamat",
                                                                                                    text: response
                                                                                                              .success
                                                                                          });
                                                                                          $('#ItemForm')
                                                                                                    .trigger(
                                                                                                              "reset"
                                                                                                    );
                                                                                          $('#ajaxModel')
                                                                                                    .modal(
                                                                                                              'hide'
                                                                                                    );
                                                                                          table
                                                                                                    .draw();
                                                                                } else {
                                                                                          Swal.fire({
                                                                                                    icon: "error",
                                                                                                    title: "Mohon Maaf !",
                                                                                                    text: response
                                                                                                              .error
                                                                                          });
                                                                                }
                                                                      },
                                                                      error: function() {
                                                                                Swal.fire({
                                                                                          icon: "error",
                                                                                          title: "Oops...",
                                                                                          text: "Something went wrong!"
                                                                                });
                                                                      }
                                                            });
                                                  }
                                        })
                              });
                    });
          </script>
@endsection
