</div>
    <!-- /#wrapper -->

    @include('modals.logout')
    @include('modals.borrar')
    @include('modals.nCultivo')
    @include('modals.crud')
    @include('modals.changepassword')
    @include('modals.map')


    <!-- zona de JS -->
    <!-- Jquery 3.3.1 -->
    <script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <!-- toastr notifications -->
    <script src="/js/toastr.js" type="text/javascript"></script>
    <!-- Bootstrap toggle -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
    <!-- bootstrap 4.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script src="/js/main.js" type="text/javascript"></script>


    <script type="text/javascript">
      $.ajaxSetup({ headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        } });
    </script>
  </body>

</html>
