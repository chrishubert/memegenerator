Meme generator class
====================

##Description

Meme Generator adds user entered text to given image in two possitions. 

Text can be placed at the top of image and at the bottom. 

If it is too long, text will be splitted into two rows. 

Font size is automatically calculated for best fit in image and it gets centered.

##Usage

###Usage with Laravel 4

Inside of `app` folder create folder called `classes`, and then go to your `start/global.php` file and edit your code so it looks something like this 

    ClassLoader::addDirectories(array(

		app_path().'/commands',
		app_path().'/controllers',
		app_path().'/models',
		app_path().'/database/seeds',
		app_path().'/classes' //this line is added

	));

Put `MemeGenerator.php` into `classes` folder.

Next go to `controllers` folder and place SampleController.php into it (or use your own controller).
Make sure you do `php artisan dump-autoload`.

Import `memegenerator.sql` into your database.

