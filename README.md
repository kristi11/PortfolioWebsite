## Status

* Actively being updated.

## About this app

This is a modest CMS created for coders worldwide to display their professional skills. Although it may not be the flashiest personal website you've come across, it is straightforward and efficient. This app utilizes the powerful [laravel jetstream](https://jetstream.laravel.com/3.x/introduction.html) with the [livewire](https://laravel-livewire.com/) stack.

## To do:

* ~~Create Models, migrations and livewire components for each model~~
* ~~CRUD for each model~~
* ~~File uploads/downloads for the resume section~~
* ~~Finalize user dashboard information~~
* ~~Finalize toaster notification system~~
* ~~Secure mailto: links~~
* ~~Design and integrate public user profile. This profile will be shown to everyone.~~

## Need to know
* If you just installed the app you will be directed to a user registration form right away. 
* After signing up you will be required to verify your email address. 
* User registration will be disabled after the first user has been created.
* User login is hidden from the public. You can access it by going to `yourdomain.com/login`.
* After verification, you're free to use the app however you like.
* 2-factor authentication is available for an added extra layer of security, but it is not required. You can use an authenticator app like [Google Authenticator](https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_US&gl=US).
* This app has support for dark mode based on system preference.
* If you're working on a local environment and your profile picture doesn't display make sure to update the `APP_URL` in your `.env` file to `APP_URL=http://localhost:8000` or whatever local enviroment link you're using.

## Showcase

<div style="position:relative;width:fit-content;height:fit-content;">
            <a style="position:absolute;top:20px;right:1rem;opacity:0.8;" href="https://clipchamp.com/watch/HPSgbsPlCyP?utm_source=embed&utm_medium=embed&utm_campaign=watch">
                <img loading="lazy" style="height:22px;" src="https://clipchamp.com/e.svg" alt="Made with Clipchamp" />
            </a>
            <iframe allow="autoplay;" allowfullscreen style="border:none" src="https://clipchamp.com/watch/HPSgbsPlCyP/embed" width="640" height="360"></iframe>

#### If you need help getting things started, contact me. I'll be happy to help.

## Getting started

Add a `.env` file and copy the contents from the `.env.example` file inside your project root. This will enable all the necessary app information. Open the console and `cd` into your project root directory.
* Run `composer install` to install necessary files
* Run `npm install` to install necessary files
* Run `npm run build`(if working on a live server) or `npm run dev`(if working on a local server) to compile the necessary files.
* You may have to run `npm audit fix` to fix any npm vulnerabilities.
* Run `php artisan key:generate` to generate a unique app key.
* Run `php artisan migrate`. This will migrate all the necessary database files.
* Run `php artisan storage:link` to create a symbolic link from `public/resumes` to `storage/app/resumes` which will allow you to access files stored in `storage/app/resumes` from the browser.
* To login to your app you will need to verify your email, so in order to do that you will need to setup an email server. I recommend using mailhog. The easiest way to get it up and running locally is to download the [mailhog](https://sourceforge.net/projects/mailhog.mirror/) `.zip` file, run it and update the `.env` file with the following information: `MAIL_HOST=localhost`. The default value might be `MAIL_HOST=mailpit`

* Run `php artisan serve` to boot up the app (if working on a local server).

### Have fun with your new app!
