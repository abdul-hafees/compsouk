<!-- Core  -->
<script src="{{ asset('/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ asset('/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('/vendor/popper-js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('/vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
<script src="{{ asset('/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
<script src="{{ asset('/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('/vendor/switchery/switchery.js') }}"></script>
<script src="{{ asset('/vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('/vendor/slidepanel/jquery-slidePanel.js') }}"></script>

<script src="{{ asset('/vendor/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-rowgroup/dataTables.rowGroup.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-scroller/dataTables.scroller.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons/dataTables.buttons.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons/buttons.html5.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons/buttons.flash.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons/buttons.print.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons/buttons.colVis.js') }}"></script>
<script src="{{ asset('/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js') }}"></script>

<script src="{{ asset('/vendor/bootbox/bootbox.js') }}"></script>
<script src="{{ asset('/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/vendor/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('/vendor/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/vendor/ladda/spin.min.js') }}"></script>
<script src="{{ asset('/vendor/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('/vendor/alertify/alertify.js') }}"></script>
<script src="{{ asset('/vendor/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/vendor/jquery-intlTelInput/js/intlTelInput-jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('vendor/formatter/jquery.formatter.min.js?v4.0.2') }}"></script>

@stack('js_vendor')

<!-- Scripts -->
<script src="{{ asset('assets/admin/js/Component.js') }}"></script>
<script src="{{ asset('assets/admin/js/Plugin.js') }}"></script>
<script src="{{ asset('assets/admin/js/Base.js') }}"></script>
<script src="{{ asset('assets/admin/js/Config.js') }}"></script>

<script src="{{ asset('assets/admin/js/Section/Menubar.js') }}"></script>
<script src="{{ asset('assets/admin/js/Section/GridMenu.js') }}"></script>
<script src="{{ asset('assets/admin/js/Section/Sidebar.js') }}"></script>
<script src="{{ asset('assets/admin/js/Section/PageAside.js') }}"></script>
<script src="{{ asset('assets/admin/js/Plugin/menu.js') }}"></script>

<script src="{{ asset('assets/admin/js/config/colors.js') }}"></script>
<script src="{{ asset('assets/admin/js/config/tour.js') }}"></script>
<script>Config.set('assets', '');</script>
@stack('js')

<!-- Page -->
<script src="{{ asset('assets/admin/js/Site.js') }}"></script>
<script src="{{ asset('assets/admin/js/Plugin/asscrollable.js') }}"></script>
<script src="{{ asset('assets/admin/js/Plugin/slidepanel.js') }}"></script>
<script src="{{ asset('assets/admin/js/Plugin/switchery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
{{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--<script src="{{ mix('/js/scripts.js') }}') }}"></script>--}}

{{--<script src="{{ asset('/vendor/editors-js/editorjs@latest.js') }}"></script>--}}

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-hyperlink@1.0.6/dist/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      info: '&nbsp;_START_ - _END_ of _TOTAL_',
      lengthMenu: 'Rows per page _MENU_&nbsp;',
      searchPlaceholder: 'Search..',
      search: '_INPUT_' // ,paginate: {
      //   previous: '<i class="icon wb-chevron-left-mini"></i>',
      //   next: '<i class="icon wb-chevron-right-mini"></i>'
      // }
      // ,
      // classes: {
      //   sFilterInput: "form-control form-control-sm",
      //   sLengthSelect: "form-control form-control-sm"
      // }

    }
  });

  jQuery.validator.setDefaults({
    debug: false,
    validClass: "is-valid",
    errorClass: "is-invalid",
    errorElement: "span",
    errorPlacement: function(error, element) {
      error.addClass('invalid-feedback');

      if($(element).parent().is('.dropify-wrapper')) {
        error.insertAfter($(element).parent());
      } else if($(element).parent().is('.input-group')) {
        error.insertAfter($(element).parent());
      } else if($(element).parent().is('.intl-tel-input')) {
        error.insertAfter($(element).parent());
      } else if($(element).parent().is('.validator-group')) {
        error.insertAfter($(element).parent());
      } else {
        error.appendTo($(element).parent());
      }
    },
    highlight: function(element, errorClass, validClass) {
      $(element).addClass(errorClass).removeClass(validClass);
      $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass).addClass(validClass);
      $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
    }
  });

  jQuery.validator.addMethod('phone', function(value, element, params) {
    return !!$(element).intlTelInput("isValidNumber");
  }, "Please enter a valid phone number.");

  $.fn.datepicker.defaults.format = 'yyyy-mm-dd';
</script>

<script>
  (function(document, window, $){
    'use strict';

    var Site = window.Site;
    $(document).ready(function(){
      Site.run();
    });

    $(document).ajaxSuccess(function(event, jqxhr, settings) {
      console.log(jqxhr);
      console.log(settings);

      var responseJSON = jqxhr.responseJSON;

      if (!responseJSON) {
        responseJSON = $.parseJSON(jqxhr.responseText);
      }

      if (responseJSON.success) {
        toastr.success(responseJSON.success);
      }

      if (responseJSON.message) {
        toastr.success(responseJSON.message);
      }

      if (responseJSON.info) {
        toastr.info(responseJSON.info);
      }

      if (responseJSON.warning) {
        toastr.warning(responseJSON.warning);
      }

      if (responseJSON.error) {
        toastr.error(responseJSON.error);
      }
    });

    $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
      console.log(jqxhr);

      var responseJSON = jqxhr.responseJSON;

      if (!responseJSON) {
        responseJSON = $.parseJSON(jqxhr.responseText);
      }

      if (jqxhr.status == 419) {
        location.reload();
      }

      if (responseJSON.message) {
        toastr.error(responseJSON.message);
      }
    });

    $('.select2').change(function() {
      $(this).valid();
    });
  })(document, window, jQuery);
</script>

<script>
  (function (document, window, $) {
    'use strict';

    <?php
        $alerts = ['success', 'info', 'warning', 'error'];
        ?>

        @foreach($alerts as $alert)
        @if(session()->has($alert))
        toastr['{{ $alert }}']('{{ session()->get($alert) }}');
    @endif
    @endforeach

    <?php
    session()->forget($alerts);
    ?>

  })(document, window, jQuery);
</script>
<script>
    $(function () {
        //select2
        $('.select2').select2();

        //file name in file input
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop(); // Get the file name without path
            $(this).next('.custom-file-label').html(fileName); // Set the file name as the label text
        });
    });
</script>

@stack('scripts')
