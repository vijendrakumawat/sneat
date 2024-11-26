
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                  </div>
                  <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
  
                    <a
                      href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >
  
                    <a
                      href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                      target="_blank"
                      class="footer-link me-4"
                      >Support</a
                    >
                  </div>
                </div>
              </footer>
              <!-- / Footer -->
  
              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>
  
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->
  
      <div class="buy-now">
        <a
          href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
          target="_blank"
          class="btn btn-danger btn-buy-now"
          >Upgrade to Pro</a
        >
      </div>
  
      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
      <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
      <script src="{{ asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
      <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  
      <script src="{{ asset('admin/assets/vendor/js/menu.js')}}"></script>
      <!-- endbuild -->
  
      <!-- Vendors JS -->
      <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
  
      <!-- Main JS -->
      <script src="{{ asset('admin/assets/js/main.js')}}"></script>
  
      <!-- Page JS -->
      <script src="{{ asset('admin/assets/js/dashboards-analytics.js')}}"></script>
  
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).on('click', '#logoutBtn', function (e) {
    e.preventDefault();

    // Confirmation dialog before logout
    Swal.fire({
        title: "Are you sure you want to logout?",
        text: "You will be logged out from your account.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, logout",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the AJAX logout request
            $.ajax({
                type: 'POST',
                url: "{{ route('logout') }}", // Correctly use Blade syntax for route
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                },
                success: function (response) {
                    // Success notification
                    Swal.fire({
                        title: 'Success!',
                        text: response.message || 'You have been logged out.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        if (response.redirect_url) {
                            // Redirect if a URL is provided in the response
                            window.location.href = response.redirect_url;
                        } else {
                            // Default fallback: reload the page
                            location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    // Handle errors
                    Swal.fire({
                        title: 'Error!',
                        text: xhr.responseJSON?.message || 'Something went wrong!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
});

</script>

</body>
</html>
  