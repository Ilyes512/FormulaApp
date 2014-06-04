# Formula App

This is a demo app made with the Framework [Laravel](http://laravel.com/) (using version 4.2, but it will also work fine with 4.1.\*). The app is made just to get some experience with the framework. It doesn't use any fancy Design Patterns. This app should be understandable for anyone that read the Laravel Documentation or any of the Laravel books out there.

# Instructions
I included a `Vagrantfile` ([Vaprobash](https://github.com/fideloper/Vaprobash)) with which you are ready to go. You will need to have [Virtualbox](https://www.virtualbox.org/wiki/Downloads) installed (or something familiar that will work with Vagrant) and [Vagrant](http://www.vagrantup.com/downloads.html). 

1. Clone this repo to your computer: `$ git clone https://github.com/fideloper/Vaprobash.git`
2. Open up your terminal and move to the cloned repo.
3. Run this on your first time: `$ vagrant up`. If you never used Vagrant then this will download a Ubuntu box and will continue and provision your box with the necessary stack (Nginx, PHP, MariaDB, Composer).
4. After it's done and your Vagrant is running\* you can visit the app in your browser with `http://192.168.22.10.xip.io/`.

\* You can check if Vagrant is running with `$ vagrant status` from within the folder or with `$ vagrant global-status` globally.


## Things that will be added
1. ~~Validation~~ Done 
2. Add a confirmation before deleting a formula/category/tag
2. Basic User Authentication
3. Add a sort of TeX WYSIWYG-editor ([Mathquill](https://github.com/mathquill/mathquill))
4. Add some Fontawesomeness (icons)

