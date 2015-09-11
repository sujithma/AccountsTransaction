hii

{!! HTML::linkAction('Auth\AuthController@getLogout', 'Logout', array(), array('class' => 'btn')) !!}


{!! Form::open(array('method' => 'post', 'id' => 'addcategory','action'=>'CategoryController@addCategory' )) !!}
    <table class="table">
        <tr>
         	<td>Name</td>
            <td>{!! Form::text('name','',array('class'=>'form-control', 'id' => 'name','placeholder'=>'name')) !!}</td>
        </tr>
        <tr>
        	<td>Parent_id</td>
            <td>{!! Form::text('parent_id','',array('class'=>'form-control', 'id' => 'parent_id','placeholder'=>'parent_id')) !!}</td>
        </tr>
        <tr>
            <td>Transaction_type</td>
            <td> {!! Form::text('transaction_type','', array('class'=>'form-control', 'id' => 'transaction_type','placeholder'=>'transaction_type')) !!}
            </td>
        </tr>
        <tr>
        <td> {!! Form::submit('Save', array('id'=>'Save', 'class' => 'btn btn-success pull-right')) !!} </td>
        </tr>
                        
                        </table>
 {!! Form::close() !!}