@extends('templates.main')

@section('title')
Login
@stop

@section('content')
<h2>Se connecter</h2>

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'AuthentificationController@loginPost'))}}

    <div class="form-group">
        {{Form::label("inputPseudo", "Pseudo", array("class" => "col-md-2 control-label"))}}
        <div class="col-md-10">
            {{Form::text("inputPseudo", null, array("class" => "form-control", "required" => "required"))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::label("inputPassword", "Mot de passe", array("class" => "col-md-2 control-label"))}}
        <div class="col-md-10">
            {{Form::password("inputPassword", array("class" => "form-control", "required" => "required"))}}
        </div>
    </div> 
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <div class="checkbox">
                <label for="cbxRemember">
                    <input type="checkbox" id="cbxRemember"> Se souvenir de moi
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-smd-10">
            <button type="submit" class="btn btn-success">Se connecter</button>
        </div>
    </div>
</form>
{{Form::close()}}
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet neque purus, ut fermentum enim euismod nec. Sed volutpat augue id lectus volutpat condimentum. Nulla vel libero libero. Duis at accumsan turpis, id ullamcorper nunc. Etiam dictum felis eu purus vulputate, ut hendrerit est aliquam. Suspendisse aliquet sed lectus venenatis porttitor. Mauris convallis mauris ultricies, aliquam urna sit amet, aliquet lectus. Sed blandit ac quam vitae condimentum.

    Phasellus pellentesque luctus diam et accumsan. Aliquam convallis mi massa, ut condimentum dui viverra scelerisque. Phasellus vitae sapien id justo porta mollis. Mauris vulputate fermentum consequat. Cras vitae maximus dui, efficitur eleifend tellus. Cras a suscipit leo. Aenean eu finibus mauris, a feugiat diam. Integer laoreet euismod velit et semper.

    Cras tincidunt imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis dignissim ultricies. Aliquam id eros eu nisi pellentesque rutrum. Phasellus dignissim egestas magna, id molestie nibh fringilla sit amet. Nulla id molestie leo. Suspendisse gravida tincidunt ultricies. Suspendisse potenti. Vivamus efficitur elementum aliquet.

    Sed euismod faucibus ligula, ac blandit orci malesuada non. Fusce ac mauris pharetra, convallis est non, finibus purus. Mauris commodo elementum odio, eu cursus justo dapibus id. Aliquam eu mi pulvinar lectus tincidunt eleifend. Suspendisse sit amet leo non dui facilisis posuere. Praesent venenatis iaculis nunc, in elementum quam tincidunt id. Mauris vestibulum ultrices sapien, at porta nisi lobortis ac. Pellentesque iaculis condimentum lectus a malesuada. Nunc a turpis justo. Cras pulvinar, nibh vitae aliquam ultricies, nisi nunc gravida diam, id blandit urna arcu vel leo. Donec condimentum malesuada nulla, ut efficitur purus aliquam quis. Pellentesque hendrerit viverra turpis, at malesuada nulla finibus non. 
</p>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet neque purus, ut fermentum enim euismod nec. Sed volutpat augue id lectus volutpat condimentum. Nulla vel libero libero. Duis at accumsan turpis, id ullamcorper nunc. Etiam dictum felis eu purus vulputate, ut hendrerit est aliquam. Suspendisse aliquet sed lectus venenatis porttitor. Mauris convallis mauris ultricies, aliquam urna sit amet, aliquet lectus. Sed blandit ac quam vitae condimentum.

    Phasellus pellentesque luctus diam et accumsan. Aliquam convallis mi massa, ut condimentum dui viverra scelerisque. Phasellus vitae sapien id justo porta mollis. Mauris vulputate fermentum consequat. Cras vitae maximus dui, efficitur eleifend tellus. Cras a suscipit leo. Aenean eu finibus mauris, a feugiat diam. Integer laoreet euismod velit et semper.

    Cras tincidunt imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis dignissim ultricies. Aliquam id eros eu nisi pellentesque rutrum. Phasellus dignissim egestas magna, id molestie nibh fringilla sit amet. Nulla id molestie leo. Suspendisse gravida tincidunt ultricies. Suspendisse potenti. Vivamus efficitur elementum aliquet.

    Sed euismod faucibus ligula, ac blandit orci malesuada non. Fusce ac mauris pharetra, convallis est non, finibus purus. Mauris commodo elementum odio, eu cursus justo dapibus id. Aliquam eu mi pulvinar lectus tincidunt eleifend. Suspendisse sit amet leo non dui facilisis posuere. Praesent venenatis iaculis nunc, in elementum quam tincidunt id. Mauris vestibulum ultrices sapien, at porta nisi lobortis ac. Pellentesque iaculis condimentum lectus a malesuada. Nunc a turpis justo. Cras pulvinar, nibh vitae aliquam ultricies, nisi nunc gravida diam, id blandit urna arcu vel leo. Donec condimentum malesuada nulla, ut efficitur purus aliquam quis. Pellentesque hendrerit viverra turpis, at malesuada nulla finibus non. 
</p>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet neque purus, ut fermentum enim euismod nec. Sed volutpat augue id lectus volutpat condimentum. Nulla vel libero libero. Duis at accumsan turpis, id ullamcorper nunc. Etiam dictum felis eu purus vulputate, ut hendrerit est aliquam. Suspendisse aliquet sed lectus venenatis porttitor. Mauris convallis mauris ultricies, aliquam urna sit amet, aliquet lectus. Sed blandit ac quam vitae condimentum.

    Phasellus pellentesque luctus diam et accumsan. Aliquam convallis mi massa, ut condimentum dui viverra scelerisque. Phasellus vitae sapien id justo porta mollis. Mauris vulputate fermentum consequat. Cras vitae maximus dui, efficitur eleifend tellus. Cras a suscipit leo. Aenean eu finibus mauris, a feugiat diam. Integer laoreet euismod velit et semper.

    Cras tincidunt imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis dignissim ultricies. Aliquam id eros eu nisi pellentesque rutrum. Phasellus dignissim egestas magna, id molestie nibh fringilla sit amet. Nulla id molestie leo. Suspendisse gravida tincidunt ultricies. Suspendisse potenti. Vivamus efficitur elementum aliquet.

    Sed euismod faucibus ligula, ac blandit orci malesuada non. Fusce ac mauris pharetra, convallis est non, finibus purus. Mauris commodo elementum odio, eu cursus justo dapibus id. Aliquam eu mi pulvinar lectus tincidunt eleifend. Suspendisse sit amet leo non dui facilisis posuere. Praesent venenatis iaculis nunc, in elementum quam tincidunt id. Mauris vestibulum ultrices sapien, at porta nisi lobortis ac. Pellentesque iaculis condimentum lectus a malesuada. Nunc a turpis justo. Cras pulvinar, nibh vitae aliquam ultricies, nisi nunc gravida diam, id blandit urna arcu vel leo. Donec condimentum malesuada nulla, ut efficitur purus aliquam quis. Pellentesque hendrerit viverra turpis, at malesuada nulla finibus non. 
</p>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet neque purus, ut fermentum enim euismod nec. Sed volutpat augue id lectus volutpat condimentum. Nulla vel libero libero. Duis at accumsan turpis, id ullamcorper nunc. Etiam dictum felis eu purus vulputate, ut hendrerit est aliquam. Suspendisse aliquet sed lectus venenatis porttitor. Mauris convallis mauris ultricies, aliquam urna sit amet, aliquet lectus. Sed blandit ac quam vitae condimentum.

    Phasellus pellentesque luctus diam et accumsan. Aliquam convallis mi massa, ut condimentum dui viverra scelerisque. Phasellus vitae sapien id justo porta mollis. Mauris vulputate fermentum consequat. Cras vitae maximus dui, efficitur eleifend tellus. Cras a suscipit leo. Aenean eu finibus mauris, a feugiat diam. Integer laoreet euismod velit et semper.

    Cras tincidunt imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis dignissim ultricies. Aliquam id eros eu nisi pellentesque rutrum. Phasellus dignissim egestas magna, id molestie nibh fringilla sit amet. Nulla id molestie leo. Suspendisse gravida tincidunt ultricies. Suspendisse potenti. Vivamus efficitur elementum aliquet.

    Sed euismod faucibus ligula, ac blandit orci malesuada non. Fusce ac mauris pharetra, convallis est non, finibus purus. Mauris commodo elementum odio, eu cursus justo dapibus id. Aliquam eu mi pulvinar lectus tincidunt eleifend. Suspendisse sit amet leo non dui facilisis posuere. Praesent venenatis iaculis nunc, in elementum quam tincidunt id. Mauris vestibulum ultrices sapien, at porta nisi lobortis ac. Pellentesque iaculis condimentum lectus a malesuada. Nunc a turpis justo. Cras pulvinar, nibh vitae aliquam ultricies, nisi nunc gravida diam, id blandit urna arcu vel leo. Donec condimentum malesuada nulla, ut efficitur purus aliquam quis. Pellentesque hendrerit viverra turpis, at malesuada nulla finibus non. 
</p>

<p>
    J'espère qu'on me voit !
</p>
@stop