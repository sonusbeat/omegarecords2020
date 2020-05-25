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
      min_height: 300,
      plugins: 'code | lists | table | fullscreen | wordcount',
      toolbar: 'undo redo | removeformat | selectall | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist table | fullscreen code | wordcount |',
      menubar: false
  });
</script>

<script>
    // Title
    $('#seo_title').keyup(function() {
        const text_max = 60;
        const text_length = $('#seo_title').val().length;
        const text_remaining = text_max - text_length;
        if(text_remaining > 0) {
            $('#title_count').removeClass('text-danger d-none').addClass('text-success d-block');
            $('#seo_title').removeClass('text-danger').addClass('text-success');
            $('#title_count b').html('Te quedan ' + text_remaining + ' caracteres restantes :)');
        }
        if(text_remaining <= 0) {
            $('#title_count, #seo_title').removeClass('text-success').addClass('text-danger');
            $('#title_count b').html('Ya no te quedan caracteres restantes ' + text_remaining + ' :(');
        }
    });

    // Description
    $('#seo_description').keyup(function() {
        const text_max = 160;
        const text_length = $('#seo_description').val().length;
        const text_remaining = text_max - text_length;
        if(text_remaining > 0) {
            $('#seo_description_count').removeClass('text-danger d-none').addClass('text-success d-block');
            $('#seo_description').removeClass('text-danger').addClass('text-success');
            $('#seo_description_count b').html('Te quedan ' + text_remaining + ' caracteres restantes :)');
        }
        if(text_remaining <= 0) {
            $('#seo_description_count, #seo_description').removeClass('text-success').addClass('text-danger');
            $('#seo_description_count b').html('Ya no te quedan caracteres restantes ' + text_remaining + ' :(');
        }
    });
</script>
