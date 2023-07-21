## Status

* Actively being updated.

## About this app

This is a modest CMS created for coders worldwide to display their professional skills. Although it may not be the
flashiest personal website you've come across, it is straightforward and efficient. This app utilizes the
powerful [laravel jetstream](https://jetstream.laravel.com/3.x/introduction.html) with
the [livewire](https://laravel-livewire.com/) stack.

## To do:

* ~~Create Models, migrations and livewire components for each model~~
* ~~CRUD for each model~~
* ~~File uploads/downloads for the resume section~~
* ~~Finalize user dashboard information~~
* ~~Finalize toaster notification system~~
* ~~Secure mailto: links~~
* ~~Design and integrate public user profile. This profile will be shown to everyone.~~
* ~~Integrate dark mode~~

## Need to know

* If you just installed the app you will be directed to a user registration form right away.
* After signing up you will be required to verify your email address.
* User registration will be disabled after the first user has been created.
* User login is hidden from the public. You can access it by going to `yourdomain.com/login`.
* After verification, you're free to use the app however you like.
* 2-factor authentication is available for an added extra layer of security, but it is not required. You can use an
  authenticator app
  like [Google Authenticator](https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_US&gl=US).
* This app has support for dark mode based on system preference.
* If you're working on a local environment and your profile picture does not display make sure to update the `APP_URL`
  in your `.env` file to `APP_URL=http://localhost:8000` or whatever local environment link you're using.

#### If you need help getting things started, contact me. I'll be happy to help.

## Showcase

### Few things to keep in mind

* I was having some computer issues at the time of recording so the app might look a little laggy.
* The screen recorder wouldn't record the upload/select forms so that's why you don't see them in the video.
* The public profile thats being showcased is a very simplified version of the actual public profile since i was simply
  showing the functionality of the app. To get a more accurate idea of how the public profile looks like you can visit
  my up and running personal website at [kristitanellari.com](https://www.kristitanellari.com)

#### Check out the screencast [here](https://clipchamp.com/watch/HPSgbsPlCyP?utm_source=share&utm_medium=social&utm_campaign=watch)

## Getting started

Add a `.env` file and copy the contents from the `.env.example` file inside your project root. This will enable all the
necessary app information. Open the console and `cd` into your project root directory.

* Run `composer install` to install necessary files
* Run `npm install` to install necessary files
* Run `npm run build`(if working on a live server) or `npm run dev`(if working on a local server) to compile the
  necessary files.
* You may have to run `npm audit fix` to fix any npm vulnerabilities.
* Run `php artisan key:generate` to generate a unique app key.
* Run `php artisan migrate:fresh`. This will migrate a fresh copy of all of the necessary database files.
* Run `php artisan storage:link` to create a symbolic link from `public/resumes` to `storage/app/resumes` which will
  allow you to access files stored in `storage/app/resumes` from the browser.
* On `analytics.blade.php` enter your `analytics` id instead of `YOUR-GOOGLE-ANALYTICS-ID`
*
    * To login to your app you will need to verify your email, so in order to do that you will need to setup an email
      server. I recommend using mailhog. The easiest way to get it up and running locally is to download
      the [mailhog](https://sourceforge.net/projects/mailhog.mirror/) `.zip` file, run it and update the `.env` file
      with the following information: `MAIL_HOST=localhost`. The default value might be `MAIL_HOST=mailpit`

* Run `php artisan serve` to boot up the app (if working on a local server).

## To optimize the performance you can run the following commands

* `php artisan config:cache` - to cache the config file
* `php artisan route:cache` - to cache the routes
* `php artisan view:cache` - to cache the views

You can find more info on laravel caching [here](https://laravel.com/docs/10.x/cache)

### Have fun with your new app!
