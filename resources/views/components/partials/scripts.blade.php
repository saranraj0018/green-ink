 <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('admin/js/custom.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
