# Formula App

This is a demo app made with the Framework [Laravel](http://laravel.com/) (using version 4.2, but it will also work fine with 4.1.\*). The app is made just to get some experience with the framework. It doesn't use any fancy Design Patterns. This app should be understandable for anyone that read the Laravel Documentation or any of the Laravel books out there.

## Instructions
I included a `Vagrantfile` ([Vaprobash](https://github.com/fideloper/Vaprobash)) with which you are ready to go. You will need to have [Virtualbox](https://www.virtualbox.org/wiki/Downloads) installed (or something familiar that will work with Vagrant) and [Vagrant](http://www.vagrantup.com/downloads.html). 

1. Clone this repo to your computer: `$ git clone https://github.com/fideloper/Vaprobash.git`
2. Open up your terminal and move to the cloned repo.
3. Run this on your first time: `$ vagrant up`. If you never used Vagrant then this will download a Ubuntu box and will continue and provision your box with the necessary stack (Nginx, PHP, MariaDB, Composer).
4. After it's done and your Vagrant is running\* you can visit the app (after setting up the database) in your browser with `http://192.168.22.10.xip.io/`.
5. The Formula App will need a database called `formula`. By default it will use PostgreSQL, but you can also use MySql (just adjust the config). Make sure you create the database, before running `php artisan migrate --seed`.


\* You can check if Vagrant is running with `$ vagrant status` from within the folder or with `$ vagrant global-status` globally.

Default users that will be seeded in local environment:

```
Username: Admin   Password: admin  
Username: Demo    Password: demo
```


## Things that will be added
1. ~~Validation~~ Done
2. ~~Add CSRF-protection~~ Done
3. Add a confirmation before deleting a formula/category/tag
4. Basic User Authentication
	- ~~Basic login~~ Done
	- ~~Make edit/delete actions only possible for logged in users~~ Done
	- Add a registration form for new users
	- Send confirmation mail
	- Resetting user password
	- Couple formula's, tag's, categories to users (see who created what)
	- Restrict edit/delete actions to owner
	- Make it possible to create public and private formulas
5. Add a sort of TeX WYSIWYG-editor ([Mathquill](https://github.com/mathquill/mathquill))
6. ~~Add some Fontawesomeness (icons)~~ Done
7. Add page pagination
8. Ready this app to be deployed to Heroku for demoing purposes


## Some screens
### The Formula index page:
<img src="https://raw.githubusercontent.com/Ilyes512/FormulaApp/master/screens/formula-index.jpeg" alt="Formula App Formula index page" style="max-width:100%"/>

### The Formula create page:
<img src="https://raw.githubusercontent.com/Ilyes512/FormulaApp/master/screens/formula-create.jpeg" alt="Formula App Formula index page" style="max-width:100%"/>

### The Formula show page:
<img src="https://raw.githubusercontent.com/Ilyes512/FormulaApp/master/screens/formula-show.jpeg" alt="Formula App Formula index page" style="max-width:100%"/>