<link href="/css/test/bootstrap.min.css" rel="stylesheet">
<link href="/css/test/tab_list.css" rel="stylesheet">

<?php
        $data = [
                'China' => 'china',
                'Mali' => 'mali',
                'UK' => 'uk',
                'Japan' => 'japan',
                'US' => 'us',
        ];
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <?php
                            $cnt = 0;
                            foreach ($data as $key => $value)
                                {
                                    if ($cnt == 0)
                                        {
                                            echo '<li class="active"><a href="#'.$key.'" data-toggle="tab">'.$key.'</a></li>';
                                        }
                                        else
                                            {
                                                echo '<li><a href="#'.$key.'" data-toggle="tab">'.$key.'</a></li>';
                                            }
                                    $cnt ++;
                                }
                        ?>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <?php
                            $cnt = 0;
                            foreach ($data as $key => $value)
                            {
                                if ($cnt == 0)
                                    {
                                        echo '<div class="tab-pane fade in active" id="'.$key.'">'.$value.'</div>';
                                    }
                                    else
                                        {
                                            echo '<div class="tab-pane fade" id="'.$key.'">'.$value.'</div>';
                                        }
                                $cnt ++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/test/jquery-2.2.4.min.js"></script>
<script src="/js/test/bootstrap.min.js"></script>
