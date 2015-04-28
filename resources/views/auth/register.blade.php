   
        <div id="signupbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
			
							@if(Session::has('message'))
								<div class="alert alert-info red">{{session::get('message')}}</div>
							@endif
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
							  <form action="/auth/register" method="post" id="signupform" class="form-horizontal" role="form">
								  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                               
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" value="{{ old('name') }}" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" value="{{ old('name') }}" placeholder="Last Name" required>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" value="{{ old('name') }}" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Conform Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confirm_passwd" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-info">Sign Up</button>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           already registered 
                                        <a href="{{ url('/') }}">
                                            Login  Here
                                        </a>
                                        </div>
                                    </div>
                                </div>     
										
								  
							</form>     
						</div>                     
					</div>  
			</div>
		
