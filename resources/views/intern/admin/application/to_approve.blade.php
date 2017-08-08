<link rel="stylesheet" href="/css/float_card.css">

<style>
    .box-body
    {
        padding-top: 0;
    }
    .panel.with-nav-tabs
    {
        border: 0;
    }
    .panel-heading
    {
        padding: 0;
        border: 0;
    }
</style>


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Internship Applications To Approve</h3>


        {{--<div class="box-tools pull-right">--}}
        <div class="box-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
        <span class="label label-primary">Label</span>

        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php
            echo $applications_to_approve;
        ?>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        The footer of the box
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
