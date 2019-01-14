<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$user_detail = $this->session->userdata('user_data_session');
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-file"></i> Dashboard
                        </li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    <h4>Welcome to the System, <i></h4>
                    <p>Hope you joy the day. Have fun</p>
                </div>
            </div>
        </div>
    </div>
</div>