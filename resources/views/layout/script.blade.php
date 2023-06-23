<script src="https://kit.fontawesome.com/e4a753eb05.js" crossorigin="anonymous"></script>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
{{-- <script src="{{ asset('path/vendor/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('path/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script> --}}

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Calender Dashboard -->
<script src="{{ asset('calender/js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('calender/js/popper.js') }}"></script>
<script src="{{ asset('calender/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('calender/js/main.js') }}"></script>


<!-- noty and js modal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-body">
                <h3 class="text-center fw-bold" style="font-size: 25px;">Anda Yakin Ingin Logout ?</h3>

            </div>
            <div class="row text-center">
                <div class="col">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Yes, Logout">
                        <a class="btn" data-bs-dismiss="modal">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Divisi Modal -->
<div class="modal fade" id="addDivisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <form action="{{ route('divisi.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="text-center">Nama Divisi</label>
                    <input type="text" class="form-control" name="nama_divisi">
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- hapus tugas modal -->
