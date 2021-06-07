@extends('layouts.student-navbar')

@section('student-content')

        <!-- Alert User -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <!-- Section is here-->
		<section class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
			<div class="container row text-white border border-danger mt-3" style=" margin-right: auto;margin-left: auto;">
				<h3 class="text-white" style="font-family: 'Times New Roman', Times, serif;">Get in Touch</h2>
				<div class="col mt-5">
					<h5 class="text-white" style="font-family: 'Times New Roman', Times, serif;">Address:</h5>
					<h6 style="font-family: 'Audiowide', sans-serif;"><strong>Krishna
	Engineering College</strong></h6>
	<p>95, Loni Road, Between Mohan Nagar
	& Air Force Station-Hindon,
	Ghaziabad, UP 201007</p>
	<a href="/contact-form" class="btn btn-primary ">Enquire</a>
    
				</div>
				<div class="col mt-5">
					<h5 class="text-white" style="font-family: 'Times New Roman', Times, serif;">Helpline number:</h5>
					<p>7007229694</p>
					<h5 class="text-white" style="font-family: 'Times New Roman', Times, serif;">E-mail:</h5>
					<p>yuvisingh11999@gmail.com</p>
					<h5 class="text-white" style="font-family: 'Times New Roman', Times, serif;">Website:</h5>
					<p>studeresys.com</p>
				</div>

				
			</div>
			
				<div class="mapouter mt-2 mb-2">
					<div class="gmap_canvas">
						<iframe width="1080" height="541" id="gmap_canvas" src="https://maps.google.com/maps?q=Krishna%20Engineering%20College%2095,%20Loni%20Road,%20Between%20Mohan%20Nagar%20&%20Air%20Force%20Station-Hindon,%20Ghaziabad,%20UP%20201007&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
						</iframe>
						<br>
						<style>
						.mapouter{
						position:relative;text-align:right;height:541px;width:1080px;margin-right: auto;margin-left: auto;
					}
				</style>
				<style>
				.gmap_canvas {overflow:hidden;background:none!important;height:541px;width:1080px;}
			</style>
		</div>
	s</div>
			
        </section>
        
        <div class="modal fade" id="myEnquire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="" method="POST">
                    @csrf
                    <div class="shadow-sm -space-y-px mb-4">
                        <div>
                            <label for="emailAddress" class="sr-only">Email Address</label>
                            <input id="emailAddress" name="emailAddress" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="shadow-sm -space-y-px mb-4">
                        <div>
                            <label for="message" class="sr-only">Message</label>
                            <textarea id="message" name="message" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Compose Email</button>
               
                </form>
            </div>
        </div>
@endsection