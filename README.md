# Sovaldi
A mock pharma website built with WordPress

## Features

1. Wordpress
2. Advanced Custom Fields
3. Form Validation
4. Bootstrap mixins
5. Intersection Observer API for ISI Tray
6. Cookie Disclaimer

## Steps

### Set up structure
1. Copy package.json and npm install dependencies
2. Create build and source folders
   1. Set up sass folder using 7-1
   2. Extract bootstrap.scss and _variables.scss and put in root of sass folder
3. Add .gitignore and README.md in root

### Set up WordPress
1. Use WP-CLI to install WordPress
   1. `wp core download` - installs wp files
   2. `wp core config --dbname=sovaldi --dbuser=root --dbpass=root` - creates wp-config file
   3. `wp db create` - creates the database from config
2. Configure MAMP to set correct directory

### Set up theme
1. Go to [underscores](http://underscores.me) and generate the '_s' based theme with custom theme title
2. Install the zipped theme and activate
3. Add [bs4navwalker](https://raw.githubusercontent.com/dupkey/bs4navwalker/master/bs4navwalker.php) and add to `/inc`
4. Edit functions.php
   1. Remove unwanted blocks
   2. Enqueue theme scripts to `/js/main.min.js` and styles to `/assets/css/style.css`. Enqueue Jquery.
   3. Add integrity and crossorigin attributes to jQuery.
5. Edit template-functions.php
   1. Require bs4navwalker
   2. Remove extraneous WP stuff

### Set up CodeKit
1. Configure build process in project settings
2. Configure SCSS output of `_bootstrap.scss` to compile to `/assets/css/style.css`
3. Configure JS output to compile to `/assets/js/main.min.js