<script src="https://kit.fontawesome.com/e4a753eb05.js" crossorigin="anonymous"></script>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
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
<script src="{{ asset('calender/js/popper.js') }}"></script>
<script src="{{ asset('calender/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('calender/js/main.js') }}"></script>


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


<!-- hapus tugas modal -->
<div class="modal fade" id="hapustugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="hapustugas">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>