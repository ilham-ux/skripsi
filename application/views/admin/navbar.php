<!-- begin header navigation right -->
<ul class="navbar-nav navbar-right">
    <li class="dropdown navbar-user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/pengguna/<?php echo $this->session->userdata('foto'); ?>" alt="" /> 
            <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li class="arrow"></li>
            <li><a href="javascript:;" data-toggle="modal" data-target="#modal-edit-profil">Edit Profil</a></li>
            <li><a href="javascript:;">Hak akses : <strong><?php echo $this->session->userdata('level'); ?></strong></a></li>
            <li class="divider"></li>
            <li><a id="link_logout" href="javascript:;">Log Out</a></li>
        </ul>
    </li>
</ul>
<!-- end header navigation right -->