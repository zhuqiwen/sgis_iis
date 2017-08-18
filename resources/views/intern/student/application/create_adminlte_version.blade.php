
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
        <h3 class="box-title">Welcome to create your Internship Application</h3>
        <br />
        <strong>Please read the guide if this is your first time.</strong>


        {{--<div class="box-tools pull-right">--}}
        <div class="box-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
        {{--<span class="label label-primary">Label</span>--}}
        {{--<span class="btn btn-danger" id="submit_approval_folio">No Application Selected</span>--}}

        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        {{--guide box--}}
        <div id="box_guide" class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Guide</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in maximus purus, vel egestas dolor. In nec odio lorem. Nam luctus, orci vitae blandit blandit, orci purus cursus ante, dignissim efficitur nulla magna non felis. Vestibulum faucibus tempor orci sed porta. Curabitur suscipit, nisl ac dapibus lobortis, metus risus ultricies risus, eget posuere purus enim et velit. Sed sollicitudin, velit ac tristique bibendum, lorem arcu pretium diam, vitae semper quam lacus et lectus. Nunc cursus in urna at accumsan.
                </p>
                <p>Aenean ac tempus leo. In hac habitasse platea dictumst. Donec mattis pellentesque semper. Phasellus dui leo, ultricies quis tempus eget, congue non nibh. Fusce vitae turpis id ipsum pulvinar tristique in eu libero. Vivamus pharetra euismod mi non vestibulum. Maecenas a ante accumsan, pharetra tortor ac, hendrerit sem. Nam vel sollicitudin libero. Maecenas in ultrices est. Quisque auctor leo quis justo tristique dapibus. Donec et dolor vulputate, euismod tellus in, volutpat tellus. Donec lacinia urna mauris. Ut quam metus, pharetra quis maximus fermentum, sollicitudin sed risus.
                </p>
                <p>Nullam molestie elit sed elit faucibus mattis. Proin aliquet, ante vitae dapibus sollicitudin, felis dui porttitor turpis, non faucibus leo justo vel libero. Etiam finibus lorem tortor. Fusce vestibulum elit risus, quis pharetra massa scelerisque sed. In posuere lectus metus. Aliquam quis metus justo. Ut nec ex bibendum, ullamcorper enim in, pulvinar felis. Nullam euismod sem sed odio aliquam scelerisque. Sed aliquam scelerisque velit id feugiat. Praesent aliquet luctus faucibus. Nulla urna urna, ullamcorper nec orci sit amet, posuere porta nisl. Curabitur finibus congue sem, quis pellentesque lacus faucibus in. Pellentesque diam odio, hendrerit a felis nec, varius semper lectus.
                </p>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- Collapse Button -->
                <button id="understand_button_internship_application_process" type="button" class="btn btn-info pull-right" data-widget="collapse">
                    <span style="color: #fff;">I understand the application process</span>
                </button>

            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--organization--}}
        <div id="box_organization" class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Which <strong>Organization</strong> is this internship with?</h3>



                {{--<div class="box-tools pull-right">--}}
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" disabled>
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('intern.student.application.create_organization_form_adminlte_version')

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                @include('intern.student.application.create_organization_form_submit_close_adminlte_version')
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--supervisor--}}
        <div id="box_supervisor" class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Who will be your internship <strong>Supervisor</strong></h3>
                <div class="box-tools">
                <!-- Collapse Button -->
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" disabled>
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('intern.student.application.create_supervisor_form_adminlte_version')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                @include('intern.student.application.create_supervisor_form_submit_close_adminlte_version')
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application--}}
        <div id="box_application" class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Other <strong>Details</strong> of this internship</h3>



                {{--<div class="box-tools pull-right">--}}
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" disabled>
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="height: 50vh;overflow-y: scroll; overflow-x: hidden">
                @include('intern.student.application.create_details_form_adminlte_version')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                @include('intern.student.application.create_details_form_submit_close_adminlte_version')
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->


        {{--liability release form--}}
        <div id="box_liability_release" class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Liability Release Form</strong></h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" disabled>
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="height: 50vh;overflow-y: scroll; overflow-x: hidden">
                liability release
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- Collapse Button -->
                <button id="submit_button_application_all" type="button" class="btn btn-info pull-right">
                    <span style="color: #fff;">Submit</span>
                </button>


            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
