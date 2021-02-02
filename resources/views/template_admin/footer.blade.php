<footer class="main-footer">
  
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  {{-- <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script> --}}
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  {{-- <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}"></script> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>  --}}
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script> -->
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


  <!-- <script>
    ClassicEditor
        .create( document.querySelector( '#textarea' ) )
        .catch( error => {
            console.error( error );
        } );
  </script> -->

      <script>
            CKEDITOR.replace( 'textarea' );
      </script>

  <!-- <script src="https://cdn.tiny.cloud/1/hsblu0xmouvkkdx14zshleddizy6m0ybjfboidilbkism1eb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    
    tinymce.init({
      selector: '#textarea',

      init_instance_callback : function(editor) {
      var freeTiny = document.querySelector('.mce-notification');
      freeTiny.style.display = 'none';
  } -->
    
   });

    </script>


  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  {{-- <script type="text/javascript">
    $(document).ready(function() {
        $('select').select2();
    });
  </script> --}}

  <!-- Page Specific JS File -->
</body>
</html>