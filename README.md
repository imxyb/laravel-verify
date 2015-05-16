**This is a laravel5 extend package for checkcode, it's just so easy and useful！**

## Installation 

 1. Your project's Composer.json must add to like this:

     

> {
	"require": {
		"xyb/verify": "dev-master"
	}
> }

 2.execute command under your project folder: **composer update**
 3.Done!

## Use ##

 1. found your **app.php**, and add item in the providers array and alias array:

 

> 'providers' => [
        '....'
        'Xyb\Verify\ServiceProvider',
],

> 'aliases' => [
	'....'
	'Checkcode' => 'Xyb\Verify\Facade',
]

2.and now you can use \Checkcode::output() to output a image for checkcode!

 


	
