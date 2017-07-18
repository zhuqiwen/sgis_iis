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



}