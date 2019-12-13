@extends('layout.user')

@section('content')     
    <section class="content">
      <img class="img" src="{{asset('logo.png')}}" style="width: 100%">
      <h1><center>Welcome to I-CLAPPS<br>International Class Application System</center></h1>
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