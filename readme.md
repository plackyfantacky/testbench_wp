# testbench_wp

A bare-bones WordPress installation with some minor tweaks to make it ready for use as a project stating point. Features include:

- Moving all files to `wordpress` subfolder ([if you're on Apache, .htaccess file is not included](https://gist.github.com/plackyfantacky/289528f2cbeddaf5e564cccc979027b2))
- Moving DB connection details out of `/wordpress/wp-config.php` into an `.env` in the root directory.
- Adding `_salt.php` for the WordPress salts and `_misc.php` for any miscellanious php code and functions you would like to add (that doesn't belong in a theme or plugin).

The point of these additiion/changes is to allow your WordPress project to be checked into version control and have other developers working on the project at the same time, while still allowing for modifications to `wp-config.php` to be shared without including database and environment details. 

_For those who may question this approach: There are a surpising amount of constants that can be added to `wp-config.php` that affect how WordPress operates, and we may need to track them, especially on large commercial projects where custom configuration is involved._

## important notes

- default files like `readme.html`, `license.txt`, and `wp-config-sample.php` have been removed in favour of clearing out clutter (YOU KNOW and we know there is enough information around the internet to know about WordPress being open source blah blah blah, yes we get it!).
- `Akismet` and `Hello Dolly` plugins removed and all themes but `TwentyTwentyFour` also removed.
- all folders in `wp-content` have been added to `.gitignore`. This is intentional. Create your own dang git repository for themes and plugins.
- Composer is available if thats your jam.

## installation

1. clone or download and unzip this thing.
2. make a database in your local dev environment.
3. rename `.env.example` to `.env` and add your data base details in there.
4. go to whatever URL your local dev environment is configured to and run the default WordPress install process.
5. ???
6. Profit