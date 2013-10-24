<?php

class MemeController extends BaseController {

	protected $layout = "master";

	public function meme($id)
	{
		try{
			$meme = Meme_instances::findOrFail($id);
			$image = Memes::findOrFail($news->meme_id);
			$news->view_count ++;
			$news->save();
		}
		catch(Exception $e){
			App::abort(404);
		}

		if(file_exists(PUBLIC_DIR.$image->img)){
			$font = PUBLIC_DIR.'assets/font/impact.ttf';
			$img = imagecreatefromjpeg(PUBLIC_DIR.$image->img);

			$white = imagecolorallocate($img, 255, 255, 255);
			$black = imagecolorallocate($img, 0, 0, 0);
			MemeGenerator::imagettftextoutline($img, 20, 0, 10, 45, $white, $black, $font, Trans::_t(strtoupper($news->first_line)), 2, 'up');
			MemeGenerator::imagettftextoutline($img, 20, 0, 10, 95, $white, $black, $font, Trans::_t(strtoupper($news->second_line)), 2, 'down');
			ob_start();
			imagejpeg($img);
			$data = base64_encode(ob_get_clean());
			return $data;
		}
		else{
			App::abort(404);
		}
		
	}

}