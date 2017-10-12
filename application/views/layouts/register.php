<?=
//$data = array(
//    'name'          => 'name',
//    'id'            => 'name',
//    'value'         => '',
//    'maxlength'     => '40',
//    'size'          => '50',
//    'style'         => 'width:50%'
//);

form_open(base_url() . "login/register")
?>

<div>
    <?= form_input(array('name' => 'name', 'value' => set_value('name'), 'placeholder' => 'Name', 'minlength' => '5', 'maxlength' => '100', 'required'=>'true')); ?>
    <?= form_error('name') ?>
</div>

<div>
    <?= form_input(array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username', 'minlength' => '5', 'maxlength' => '20', 'required'=>'true')); ?>
    <?= form_error('username') ?>
</div>

<div>
    <?= form_password(array('name' => 'password', 'value' => set_value('password'), 'placeholder' => 'Password', 'minlength' => '5', 'maxlength' => '20', 'required'=>'true')); ?>
    <?= form_error('password') ?>
</div>

<div>
    <?= form_password(array('name' => 'password_conf', 'value' => set_value('password_conf'), 'placeholder' => 'Password', 'minlength' => '5', 'maxlength' => '20', 'required'=>'true')); ?>
    <?= form_error('password_conf') ?>
</div>
<div>
    <?= form_input(array('name' => 'email', 'value' => set_value('email'), 'placeholder' => 'email', 'minlength' => '5', 'maxlength' => '100', 'required'=>'true')); ?>
    <?= form_error('email') ?>
</div>
<br>

<?= form_submit(array('name' => 'submit', 'value' => 'Register')); ?>
</div>

<?= form_close(); ?>
