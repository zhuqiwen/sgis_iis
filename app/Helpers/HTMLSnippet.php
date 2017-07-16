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
                                <h3>
                                    $title_left
                                </h3>
                                <p>
                                    $text_left
                                </p>
                            </div>
                        </a>
                        <a href="$href_right">
                            <div id="float-card" class="col-md-5 col-md-offset-2 float-card">
                                <h3>
                                    $title_right
                                </h3>
                                <p>
                                    $text_right
                                </p>
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
                                <h3>
                                    $title_left
                                </h3>
                                <p>
                                    $text_left
                                </p>
                            </div>
                        </a>
					</div>
				</div>
EOF;
		}

		echo $row;
	}



}