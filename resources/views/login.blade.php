<div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Welcome Guest
                   
                </h1>
            </div>
        </div>
        <!-- /.row -->                         
        <div class="row">
            <div class="col-lg-4 pull-right box-borderd">
                <div class="row">
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="col-lg-12">
                    {!! Form::open(array('method' => 'post', 'id' => 'addTaskForm','action'=>'Auth\AuthController@postLogin' )) !!}
                        <table class="table">
                  
                            <tr>
                                <td>Email</td>
                                <td>{!! Form::text('email','',array('class'=>'form-control', 'id' => 'email','placeholder'=>'email')) !!}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td> {!! Form::password('password', array('class'=>'form-control', 'id' => 'password','placeholder'=>'password')) !!}
                                

                                </td>
                            </tr>
                             <tr>
                                <td>Remember Me</td>
                                <td> {!! Form::checkbox('remember') !!}</td>
                            </tr>
                               
                                <td> {!! Form::submit('login', array('id'=>'loginn', 'class' => 'btn btn-success pull-right')) !!} </td>
                            </tr>
                        
                        </table>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
