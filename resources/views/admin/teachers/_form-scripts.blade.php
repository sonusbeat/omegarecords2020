<!-- Custom Scripts -->
<script src="{{ asset('admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    /* Datepicker */
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

<script>
  tinymce.init({
      selector: '.editor',
      min_height: 500,
      plugins: 'code | lists | fullscreen | wordcount',
      toolbar: 'undo redo | removeformat | selectall | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | fullscreen code | wordcount |',
      menubar: false
  });
</script>
