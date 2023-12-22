  <!--   Core JS Files   -->
  <script src="<?= base_url('aset/') ?>js/core/popper.min.js"></script>
  <script src="<?= base_url('aset/') ?>js/core/bootstrap.min.js"></script>
  <script src="<?= base_url('aset/') ?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url('aset/') ?>js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url('aset/') ?>js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url('aset/') ?>js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <script src="<?= base_url('aset/quill/') ?>quill.min.js"></script>
  <script src="<?= base_url('aset/') ?>aos/dist/aos.js"></script>
  <script src="<?= base_url('aset/') ?>echarts/echarts.min.js"></script>

  <script>
    AOS.init();
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var searchInput = document.getElementById('searchInput');
          var searchForm = document.getElementById('searchForm');
  
          searchInput.addEventListener('input', function () {
              searchForm.submit();
          });
      });
  </script>
  <script>
    var quill = new Quill('#editor', {
      theme: 'snow',
      modules: {
        toolbar: [
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            [{ font: [] }],
            ["bold", "italic"],
            ["link", "blockquote", "code-block", "image"],
            [{ list: "ordered" }, { list: "bullet" }],
            [{ script: "sub" }, { script: "super" }],
            [{ color: [] }, { background: [] }],
        ]
    },
    });
    quill.on('text-change', function(delta, oldDelta, source) {
      document.querySelector("input[name='deskripsi']").value = quill.root.innerHTML;
    });
  </script>

</body>
</html>