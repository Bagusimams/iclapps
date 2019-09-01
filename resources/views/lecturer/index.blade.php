@extends('layout.user')

@section('content')     
    <section class="content">
      <h1><center>Welcome to ICAO Application<br>Telkom University</center></h1>
    </section>
    
    @section('javascript-addon') 
      <script type="text/javascript">
          $(document).ready(function() {
              setTimeout(fade_out, 5000);

            function fade_out() {
              $("#message").fadeOut().empty();
            }
          });
      </script>
    @endsection 

    @include('layout.footer')
@endsection