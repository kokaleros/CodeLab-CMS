<?php
$logged_user_id = $user['user_id'];
?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Lista korisnika</h5>
        </div>

        <div class="panel-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets.

            <br>
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th width="20px">#ID</th>
                <th width="170px">Ime</th>
                <th>Email</th>
                <th>Broj telefona</th>
                <th>Lokacija</th>
                <th>Kreiran</th>
                <th width="50px">Status</th>
                <th class="text-center">Opcije</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($users) && !empty($users)):
                foreach ($users as $user):
                    $user_status = get_account_status($user->active, $user->last_login);
                    ?>

                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><a href="<?php echo base_url('/users/profil/' . $user->id); ?>"><?php echo $user->name; ?></a></td>
                        <td><a href="mailto:<?php echo $user->email; ?>" target="_blank"><?php echo $user->email; ?></a>
                        </td>
                        <td><a href="tel:<?php echo $user->telephone; ?>"
                               target="_blank"><?php echo $user->telephone; ?></a></td>
                        <td><?php echo get_location_info($user->city, $user->country); ?></td>
                        <td width="170px"><?php echo date("j.n.Y  H:i", $user->created); ?></td>
                        <td>
                            <span class="label <?php echo $user_status['class']; ?>"><?php echo $user_status['message']; ?></span>
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo base_url('/users/edit/' . $user->id); ?>">
                                                <i class="icon-pencil7"></i> Uredi</a>
                                        </li>

                                        <li><a href="<?php echo base_url('/users/delete/' . $user->id); ?>">
                                                <i class="icon-cross2"></i> Izbrisi</a>
                                        </li>

                                        <li><a href="<?php echo base_url('/users/profil/' . $user->id); ?>">
                                                <i class="icon-user"></i> Pogledaj profil</a>
                                        </li>

                                        <?php if ($logged_user_id != $user->id): ?>
                                            <li>
                                                <a href="<?php echo base_url('/users/switch/' . $user->id); ?>">
                                                    <i class="icon-users2"></i>
                                                    Uđi kao <?php echo $user->username ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php
                endforeach;
            endif;
            ?>
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

<?php
function get_location_info($city, $country)
{
    if (!empty($city) && !empty($country)) {
        $location_info = $city . ", " . $country;
    } else {
        $location_info = "Nepoznato";
    }

    return $location_info;
}

function get_account_status($active, $last_login = '')
{
    $code = '';

    if ($active == 0) {
        $code = 'Nepotvrđen';
        $css = 'label-danger';
    } else if ($active == 1 && empty($last_login)) {
        $code = 'Neaktivan';
        $css = 'label-info';
    } else {
        $code = 'active';
        $css = 'label-success';
    }

    return array(
        'message' => $code,
        'class' => $css
    );
}


?>