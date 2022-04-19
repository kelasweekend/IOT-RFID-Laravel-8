@extends('layouts.admin.master')

@section('title')
          Debit Master
@endsection

@section('content')
          <div class="main-wrapper">
                    <div class="row">
                              <div class="col-md-12 col-lg-8">
                                        <div class="card table-widget shadow-sm p-3">
                                                  <div class="card-body">
                                                            <div class="row">
                                                                      <div class="col-md-5">
                                                                                <img src="{{ asset('theme/images/tambah.svg') }}" alt="" class="w-100">
                                                                                <p class="card-description mb-3 mt-4 text-center font-weight-bold">Buat debit baru dengan mengisi seluruh Form
                                                                                          dengan benar</p>
                                                                                <a href="{{route('admin.debit.list')}}" class="btn btn-secondary float-start mt-2 shadow-sm"><i class="fa fa-eye"></i> List Debit</a>
                                                                      </div>
                                                                      <div class="col-md-7">
                                                                                <form id="ItemForm">
                                                                                    @csrf
                                                                                          <div class="mb-3">
                                                                                                    <label for="exampleInputEmail1" class="form-label">Debit Card Number</label>
                                                                                                    <div class="input-group flex-nowrap">
                                                                                                              <span class="input-group-text" id="addon-wrapping">UID</span>
                                                                                                              <input type="text" name="code" id="code" class="form-control" readonly
                                                                                                                        placeholder="34SDxxx">
                                                                                                    </div>
                                                                                          </div>
                                                                                          <div class="mb-3">
                                                                                                    <label for="exampleInputPassword1" class="form-label">Pemilik Debit</label>
                                                                                                    <select class="form-select" name="user" aria-label="Default select example" id="user">
                                                                                                              @foreach ($user as $pengguna)
                                                                                                                        <option value="{{ $pengguna->id }}">{{ $pengguna->name }}</option>
                                                                                                              @endforeach
                                                                                                    </select>
                                                                                          </div>
                                                                                          <div class="row">
                                                                                                    <div class="col-md-6 col-12">
                                                                                                              <div class="mb-3">
                                                                                                                        <label for="exampleInputEmail1" class="form-label">Masukan Saldo
                                                                                                                                  Awal</label>
                                                                                                                        <div class="input-group flex-nowrap">
                                                                                                                                  <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                                                                                  <input type="number" name="saldo" id="saldo"
                                                                                                                                            class="form-control" placeholder="500.000">
                                                                                                                        </div>
                                                                                                              </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6 col-12">
                                                                                                              <div class="mb-3">
                                                                                                                        <label for="exampleInputEmail1" class="form-label">Limit
                                                                                                                                  Transaksi</label>
                                                                                                                        <div class="input-group flex-nowrap">
                                                                                                                                  <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                                                                                  <input type="number" name="limit" id="limit"
                                                                                                                                            class="form-control" placeholder="100.000">
                                                                                                                        </div>
                                                                                                              </div>
                                                                                                    </div>
                                                                                          </div>
                                                                                          <div class="mb-3">
                                                                                                    <label for="exampleInputEmail1" class="form-label">Pin Debit</label>
                                                                                                    <div class="input-group flex-nowrap">
                                                                                                              <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                                                                              <input type="password" name="pin" id="pin" class="form-control"
                                                                                                                        placeholder="********">
                                                                                                    </div>
                                                                                          </div>
                                                                                          <button type="button" class="btn btn-primary float-end saveBtn">Submit</button>
                                                                                </form>
                                                                      </div>
                                                            </div>
                                                  </div>
                                        </div>
                                        <div class="alert alert-warning shadow-sm" role="alert">
                                                  Jika Debit Card Hilang Silahkan Non aktifkan dengan cara menghapus Debit !
                                        </div>
                              </div>

                              <div class="col-md-12 col-lg-4">
                                        <div class="card shadow-sm p-4 table-widget">
                                                  <img src="{{ asset('theme/images/saldo.svg') }}" style="width: 85%;margin: 0 auto;">
                                                  <p class="card-description mb-3 mt-4">Cek Saldo Debit anda disini dan Pastikan saldo Masih tersedia</p>
                                                  <div class="input-group flex-nowrap">
                                                            <span class="input-group-text" id="addon-wrapping">UID</span>
                                                            <input type="text" class="form-control" readonly placeholder="34SDxxx">
                                                  </div>
                                                  <div class="input-group flex-nowrap mt-3">
                                                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                            <input type="text" class="form-control" readonly placeholder="Jumlah Saldo">
                                                  </div>
                                                  <button class="btn btn-danger mt-3" type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            Loading...
                                                  </button>
                                        </div>
                              </div>
                    </div>
          </div>
@endsection

@section('css-tambahan')
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('js-tambahan')
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
          <script type="text/javascript">
                    $('#user').select2({
                              theme: 'bootstrap-5'
                    });
          </script>
          <script type="text/javascript">
                    $(function() {
                              $.ajaxSetup({
                                        headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                              });
                              $('.saveBtn').click(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                                  data: $('#ItemForm').serialize(),
                                                  url: "{{ route('admin.debit.add') }}",
                                                  type: "POST",
                                                  dataType: 'json',
                                                  success: function(response) {
                                                            if (response.success) {
                                                                      Swal.fire({
                                                                                icon: "success",
                                                                                title: "Selamat",
                                                                                text: response.success
                                                                      });
                                                                      $('#ItemForm').trigger("reset");
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
                    });
          </script>
@endsection
