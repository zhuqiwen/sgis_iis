<link rel="stylesheet" href="/css/float_card.css">



<div class="box">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-4">
                {{--<h3 class="box-title">Internship Applications To Approve</h3>--}}
                <h3 class="box-title">Internship Applications To Approve</h3>
            </div>
            <div class="col-md-2">
                <ul class="nav box-title">

                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown"
                           role="button"
                           aria-expanded="false">
                            <h3 class="box-title">Group By
                            <span class="caret"></span>
                            </h3>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    Country
                                </a>


                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-md-offset-3">
                <span class="label label-primary">Label</span>

            </div>
        </div>

        {{--<div class="box-tools pull-right">--}}
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->

        {{--</div>--}}
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