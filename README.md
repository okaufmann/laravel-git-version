Laravel project git version getter
==================================

A helper class to get the current git version of the project.

Expects either a `version` file to exist in the `base_path()` of your project
containing a version string, or the `git` binary to be available.

**This is my own for to match my needs**
Originally initiated by [@tremby](https://github.com/tremby/laravel-git-version)
Consider contribute to his version.

Laravel version
---------------

This package works with both Laravel 4 and 5.

Installation
------------

Require it in your Laravel project:

    composer require okaufmann/laravel-git-version

Install the service provider by adding it to your `config/app.php`
file:

    'providers' => [
        ...
        Tremby\LaravelGitVersion\GitVersionServiceProvider::class,
    ],

Use
---

You can get the git version string with

    \Tremby\LaravelGitVersion\GitVersionHelper::getVersion()

Or you can get your app name and version number such as `my-project/1.0` with

    \Tremby\LaravelGitVersion\GitVersionHelper::getNameAndVersion()

Also, you can get the latest commit hash by calling this method:

    \Tremby\LaravelGitVersion\GitVersionHelper::getHash(8)
    
`getHash()` method gets an integer which is the length of commit hash. If it's null, `getHash()` returns full width.

The app's name is taken from `Config::get('app.name', 'app')`, so you can
configure it in your `config/app.php` file or leave it as the default of `app`.

### Command
On releasing a new version of you app run the following commands to tag a new version and create a file with the correct version info:

    git tag v0.0.3
    php artisan version:bump


### Recommended usage pattern

Ensure your git tags are pushed to your servers
so that the versions are described properly.

During development and possibly in staging environments
allow the version to be determined automatically
(this is done via `git describe`).

As part of your production deployment procedure,
write a `version` file (perhaps via a command like
`git describe --always --tags --dirty >version`,
since this is the command this package would run otherwise).
When this `version` file exists the package will use its contents
rather than executing `git`, saving some processor and IO time.

Add `/version` to your `.gitignore` file
so your working tree stays clean and you don't accidentally commit it.

View
----

A view is provided which just outputs an HTML comment with the return value of
`getNameAndVersion()`. I like to include this in the main layout template of the
project.

The view is available:

    @include('git-version::version-comment')
