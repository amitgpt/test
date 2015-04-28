
 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Please Enter a valid git name</div>
                    </div> 
                     <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>  
                    <form action="/setting" method="post" id="loginform" class="form-horizontal" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="git-name" type="text" class="form-control" name="gitname" value="" placeholder="git name" required>                                        
							</div>
							<div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

								<div class="col-sm-12 controls">
								  <button button="submit" class="btn btn-success">Continue</button>
								</div>
                            </div>
					</form>
					</div>
                    
            </div>
</div>
