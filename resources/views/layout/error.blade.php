@if($errors->any())
	<section class="bg-primary" style="padding-bottom: 0px;">
    	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
					<div class="alert alert-danger content" style="font-size: 15px; margin-bottom: -50px;">
				        <ul>
				            @foreach ($errors->all() as $error)
				                {{ $error }}<br>
				            @endforeach
				        </ul>
				    </div>
                </div>
            </div>
        </div>
    </section>
@endif