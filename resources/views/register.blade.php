<div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   
                </h1>
            </div>
        </div>
        <!-- /.row -->                         
        <div class="row">
            <div class="col-lg-4 pull-right box-borderd">
                <div class="row">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="col-lg-12">
                    {!! Form::open(array('method' => 'post', 'id' => 'registerForm','action'=>'Auth\AuthController@postRegister' )) !!}
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>{!! Form::text('name','',array('class'=>'form-control', 'id' => 'name','placeholder'=>'name')) !!}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{!! Form::text('email','',array('class'=>'form-control', 'id' => 'email','placeholder'=>'email')) !!}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td> {!! Form::password('password', array('class'=>'form-control', 'id' => 'password','placeholder'=>'password')) !!}
                                

                                </td>
                               
                            </tr>
        
                               
                                <td> {!! Form::submit('Save', array('id'=>'Save', 'class' => 'btn btn-success pull-right')) !!} </td>
                            </tr>
                        
                        </table>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
