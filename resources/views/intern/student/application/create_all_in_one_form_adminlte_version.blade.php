
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

        <div class="box-tools">

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
                @include('intern.student.application.partials.understand_button')

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
                @include('intern.student.application.partials.organization_body')

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                    echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                        'organization_button',
                        config('constants.form_id_internship_application'),
                        'submit',
                        'Next'
                        );
                ?>
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
                @include('intern.student.application.partials.supervisor_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'supervisor_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_basic_details--}}
        <div id="box_application" class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Basic Details</strong> of this internship</h3>
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
                @include('intern.student.application.partials.application_basic_details_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_basic_details_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_location--}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Where</strong> will the internship be?</h3>
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
                @include('intern.student.application.partials.application_location_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_location_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_dates--}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Important <strong>Dates</strong></h3>
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
                @include('intern.student.application.partials.application_dates_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_dates_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_budget--}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>How much</strong> could this internship cost?</h3>
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
                @include('intern.student.application.partials.application_budget_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_budget_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_work_schedule--}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">What <strong>work schedule</strong> of this internship is like?</h3>
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
                @include('intern.student.application.partials.application_work_schedule_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_work_schedule_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Next'
                );
                ?>
            </div>
            <!-- box-footer -->
        </div>
        <!-- /.box -->

        {{--application_value--}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">What <strong>value</strong> of this internship could be?</h3>
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
                @include('intern.student.application.partials.application_value_body')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                echo \app\Helpers\HTMLSnippet::generateInternshipApplicationFormButton(
                    'application_value_button',
                    config('constants.form_id_internship_application'),
                    'submit',
                    'Submit'
                );
                ?>
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