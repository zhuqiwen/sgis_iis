<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 7/12/17
 * Time: 15:12
 */

namespace app\Helpers;

class HTMLSnippet
{

	/**
	 * @param $margin_top in percent or px
	 * @param array $href_title_text
	 * [
	 *  ['href' => string, 'title' => string, 'text' => string],
	 *  ['href' => string, 'title' => string, 'text' => string]
	 * ]
	 */
	public static function generateCardRow($margin_top, array $href_title_text)
	{
		if(count($href_title_text) == 2)
		{
			$href_left = $href_title_text[0]['href'];
			$href_right = $href_title_text[1]['href'];
			$title_left = $href_title_text[0]['title'];
			$title_right = $href_title_text[1]['title'];
			$text_left = $href_title_text[0]['text'];
			$text_right = $href_title_text[1]['text'];

			$row = <<< EOF
				<div class="row" style="margin-top: $margin_top">
                    <div class="col-sm-12">
                        <a href="$href_left">
                            <div id="float-card" class="col-md-5 float-card">
                            <div class="title">
                                <h3>
                                    $title_left
                                </h3>
                            </div>
                            <div class="text">
                                <p>
                                    $text_left
                                </p>
                            </div>
                            </div>
                        </a>
                        <a href="$href_right">
                            <div id="float-card" class="col-md-5 col-md-offset-2 float-card">
                            <div class="title">
                                <h3>
                                    $title_right
                                </h3>
                            </div> 
                            <div class="text">
                                <p>
                                    $text_right
                                </p>
                            </div>    
                            </div>
                        </a>
					</div>
				</div>
EOF;
		}
		elseif (count($href_title_text) == 1)
		{
			$href_left = $href_title_text[0]['href'];
			$title_left = $href_title_text[0]['title'];
			$text_left = $href_title_text[0]['text'];

			$row = <<< EOF
				<div class="row" style="margin-top: $margin_top">
                    <div class="col-sm-12">
                        <a href="$href_left">
                            <div id="float-card" class="col-md-5 float-card">
                            <div class="title">
                                <h3>
                                    $title_left
                                </h3>
                            </div>
                            <div class="text">
                                <p>
                                    $text_left
                                </p>
                            </div>
                            </div>
                        </a>
					</div>
				</div>
EOF;
		}

		echo $row;
	}

	/**
	 * @param $margin_top
	 * @param array $cards
	 * [
	 *  [//left card
	 *      [front and back]
	 *  ],
	 *  [//right card
	 *      [front and back]
	 *  ]
	 * ]
	 */
	public static function generateRotatingCardRow($margin_top, array $cards)
	{

		if(count($cards) == 2)
		{
			$left_front_title = $cards[0]['front_title'];
			$left_front_text = $cards[0]['front_text'];
			$left_back_title_1 = $cards[0]['back_title_1'];
			$left_back_title_2 = $cards[0]['back_title_2'];
			$left_back_url_1 = $cards[0]['back_url_1'];
			$left_back_url_2 = $cards[0]['back_url_2'];

			$right_front_title = $cards[1]['front_title'];
			$right_front_text = $cards[1]['front_text'];
			$right_back_title_1 = $cards[1]['back_title_1'];
			$right_back_title_2 = $cards[1]['back_title_2'];
			$right_back_url_1 = $cards[1]['back_url_1'];
			$right_back_url_2 = $cards[1]['back_url_2'];


			$row = <<<EOF
		<div class="row"  style="margin-top: $margin_top">
	        <div class="col-sm-12">
	            <div class="col-md-5">
	                <div class="card-container">
	                    <div class="card">
	                        <div class="front">
	                            <div class="front-title">
	
	                                <h3>$left_front_title</h3>
	                            </div>
	                            <div class="front-text">
	                                <p>$left_front_text</p>
	                            </div>
	                        </div> <!-- end front panel -->
	                        <div class="back">
	                            <div class="col-sm-12">
	                                <a href="$left_back_url_1">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title" >
	
	                                            <h3>$left_back_title_1</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                                <a href="$left_back_url_2">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title">
	                                            <h3>$left_back_title_2</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                            </div>
	                        </div> <!-- end back panel -->
	                    </div> <!-- end card -->
	                </div> <!-- end card-container -->
	            </div> <!-- end col md 5 -->
	            <div class="col-md-5 col-md-offset-2">
	                <div class="card-container">
	                    <div class="card">
	                        <div class="front">
	                            <div class="front-title">
	
	                                <h3>$right_front_title</h3>
	                            </div>
	                            <div class="front-text">
	                                <p>$right_front_text</p>
	                            </div>
	                        </div> <!-- end front panel -->
	                        <div class="back">
	                            <div class="col-sm-12">
	                                <a href="$right_back_url_1">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title" >
	
	                                            <h3>$right_back_title_1</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                                <a href="$right_back_url_2">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title" >
	
	                                            <h3>$right_back_title_2</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                            </div>
	                        </div> <!-- end back panel -->
	                    </div> <!-- end card -->
	                </div> <!-- end card-container -->
	            </div> <!-- end col md 5 -->
	        </div> <!-- end col-sm-10 -->
        </div> <!-- end row -->
EOF;
		}
		elseif (count($cards) == 1)
		{
			$left_front_title = $cards[0]['front_title'];
			$left_front_text = $cards[0]['front_text'];
			$left_back_title_1 = $cards[0]['back_title_1'];
			$left_back_title_2 = $cards[0]['back_title_2'];
			$left_back_url_1 = $cards[0]['back_url_1'];
			$left_back_url_2 = $cards[0]['back_url_2'];


			$row = <<<EOF
		<div class="row"  style="margin-top: $margin_top">
	        <div class="col-sm-12">
	            <div class="col-md-5">
	                <div class="card-container">
	                    <div class="card">
	                        <div class="front">
	                            <div class="front-title">
	
	                                <h3>$left_front_title</h3>
	                            </div>
	                            <div class="front-text">
	                                <p>$left_front_text</p>
	                            </div>
	                        </div> <!-- end front panel -->
	                        <div class="back">
	                            <div class="col-sm-12">
	                                <a href="$left_back_url_1">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title" >
	
	                                            <h3>$left_back_title_1</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                                <a href="$left_back_url_2">
	                                    <div class="col-sm-6 float-card" id="float-card">
	                                        <div class="back-title">
	                                            <h3>$left_back_title_2</h3>
	                                        </div>
	                                    </div>
	                                </a>
	                            </div>
	                        </div> <!-- end back panel -->
	                    </div> <!-- end card -->
	                </div> <!-- end card-container -->
	            </div> <!-- end col md 5 -->
	        </div> <!-- end col-sm-10 -->
        </div> <!-- end row -->
EOF;
		}

		echo $row;


	}

	public static function generateFloatCardWithModal($application)
	{
		$modal = self::generateApplicationModal($application);
		$card = <<< EOF
		<div class="col-md-4" style="margin-bottom: 5%;">
            <a href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModalApplicationId_$application->id">
                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                    <div class="title" id="$application->id">
	                    <div class="row">
	                        <div class="col-md-9">
	                                <h4 id="applicant_name">
	                                    $application->last_name, $application->first_name
	                                    <br/><small>Application ID: $application->id</small>
	                                </h4>
	                        </div>
	                        <div id="iconCheck_$application->id" class="col-md-3 hide" style="margin-top:5%;">
	                            <i class="fa fa-check fa-2x"></i>
	                        </div>
	                    </div>
                    </div>
                    <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                    <div class="text">
                        <div class="row">
	                        <div class="col-md-12">
		                        <p><strong>Internship Address:</strong></p>
		                        <p>$application->street, $application->city,</p>
		                        <p>$application->state, $application->country</p>
		                        <p><strong>Internship Organization:</strong></p>
		                        <p>$application->org_name</p>
		                        <p><strong>Internship Date:</strong></p>
		                        <p>From $application->start_date To $application->end_date</p>
		                    </div>
	                    </div>
                    </div>
                </div>
            </a>
            $modal

        </div>
EOF;
		return $card;


	}

	private static function generateApplicationModal($application)
	{
		$modal =<<<EOF
			<div id="myModalApplicationId_$application->id" class="modal fade" role="dialog">
                <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">$application->first_name $application->last_name 's Internship in $application->country</h4>
                                <p>$application->credit_hours Credit Hours Desired</p>
                            </div>
                            <div class="modal-body">
                                <div>
                                <h4>Internship Location: <small>$application->street, $application->state, $application->country</small></h4> 
                                <img src="http://via.placeholder.com/800x300">
                                </div>
                                <hr>
                                <div>
                                $application->term, in $application->year<br>
                                plan to leave the States on $application->depart_date and return on $application->return_date<br>
                                The internship starts on $application->start_date and ends on $application->end_date<br>
                                </div>
                                <hr>
                                <div>
                                $application->description<br>
                                </div>
                                <hr>
                                <div>
                                $application->reasons<br>
                                </div>
                                <hr>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button id="$application->id" type="button" class="btn btn-info addToFolio" data-dismiss="modal">Select In To Approval Folio</button>
                                <button id="$application->id" type="button" class="btn btn-danger removeFromFolio" data-dismiss="modal">Remove From Approval Folio</button>
                            </div>
                      </div>

                </div>
            </div>

EOF;
		return $modal;


	}

	public static function generateApplicationGroupTab($tab_name, $active = FALSE)
	{
		$original_tab_name = str_replace('_', ' ', $tab_name);
//		$tab_name = str_replace(' ', '_', $tab_name);


		if($active)
		{
			$li = '<li class="active">';
		}
		else
		{
			$li = '<li>';
		}
		return $li.'<a href="#'.$tab_name.'" data-toggle="tab">'.$original_tab_name.'</a></li>';
	}

	public static function generateInternshipAssignmentModal($doc_type, array $attributes = [])
    {
        $action = '/test_assignment_post';
         switch ($doc_type)
         {
             case 'journal':
                 $modal_body = self::generateJournalForm($action);
                 break;
             case 'reflection':
                 $modal_body = self::generateReflectionForm($action);
                 break;
             case 'site_evaluation':
                 $modal_body = self::generateSiteEvaluationForm($action);
                 break;
             case 'student_evaluation':
                 $modal_body = 'Student Evaluation body';
                 break;
             default:
                 $modal_body = 'No assignment selected';
         }

        $modal = <<<EOF
           <!-- Modal -->
              <div class="modal fade" id="modal_$doc_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">$doc_type</h4>
                    </div>
                    <div class="modal-body">
                     $modal_body
                    </div>
                    <div class="modal-footer">Modal Footer Content
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                      <button type="submit" class="btn btn-primary">submit</button>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

EOF;

        return $modal;
    }

    public static function generateSiteEvaluationForm($action)
    {
        $recommend_options = function ($max){
            $options = '';
            for($i = 0; $i < $max; $i++)
            {
                $options .= '<option value="' . $i . '">' . $i . '</option>';
            }
            return $options;
        };
        // use 0 as a place holder fo internship_id
        $form = <<<EOF
        <form action="$action" method="post">
        
        <label for="how_did_locate">How did you locate this internship site?</label><br>
        <textarea id="how_did_locate" name="how_did_locate"></textarea><br>
        
        <label for="site_description">please give a short description of the internship site</label><br>
        <textarea id="site_description" name="site_description"></textarea><br>
        
        <label for="task_description">please shortly describe your tasks during the internship</label><br>
        <textarea id="task_description" name="task_description"></textarea><br>
        
        <label for="fit_into_study">how does this internship fit into your academic study?</label><br>
        <textarea id="fit_into_study" name="fit_into_study"></textarea><br>
        
        <label for="site_strength">what is the strength of the internship site?</label><br>
        <textarea id="site_strength" name="site_strength"></textarea><br>
        
        <label for="site_weakness">what is the weakness?</label><br>
        <textarea id="site_weakness" name="site_weakness"></textarea><br>
        
        <label for="gained_skills">what skills did you gain from this internship?</label><br>
        <textarea id="gained_skills" name="gained_skills"></textarea><br>
        
        <label for="brief_comment">give a brief comment in general on the internship and it's site</label><br>
        <textarea id="brief_comment" name="brief_comment"></textarea><br>
        
        <label for="willing_to_recommend">how much would you like to recommend this internship site?</label><br>
        <select id="willing_to_recommend" name="willing_to_recommend">
            {$recommend_options(9)}
        </select>
        
     

EOF;
        return $form;


    }

    public static function generateJournalForm($action)
    {
        $form = <<<EOF
        <form action="$action" method="post">
        
        <label for="journal">You can write or copy/paste in the following text area</label><br>
        <textarea name="journal" id="journal"></textarea><br>

EOF;
        return $form;
    }


    public static function generateReflectionForm($action)
    {
        $form = <<<EOF
        <form action="$action" method="post">
        
        <label for="reflection">You can write or copy/paste in the following text area</label><br>
        <textarea name="reflection" id="reflection"></textarea><br>

EOF;
        return $form;
    }






}