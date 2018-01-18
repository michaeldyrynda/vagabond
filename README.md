# Vagabond

## About Vagabond

Vagabond is a project that lets you leverage [Nomad](https://github.com/michaeldyrynda/nomad) - Laravel-style database migrations wherever they may roam.

Nomad gives you the power of Laravel's [database migrations](https://laravel.com/docs/5.5/migrations) without the need for a full Laravel installation.

This is particularly useful where you have multiple applications accessing a single database, but you aren't sure which should be responsible for managing the database schema. By extracting your migrations to a separate repository, you can maintain full version control over your database schema, without worrying about different applications trying to run the migrations on the same database.

In addition, you also have the ability to use those centralised migrations within your application test suite much more easily, without having to either duplicate the migrations or run against your own copy of the database.

## Installation

In order to create a new Vagabond project, you can use [Composer](https://getcomposer.org).

```
composer create-project --prefer-dist dyrynda/vagabond wanderer
```

Once installed, you will have access to the `nomad` application, a default configuration to work with an sqlite database, and a `MigrationServiceProvider` that will be automatically loaded, should you choose to use your Vagabond project to share your migrations with other Laravel applications.

## Usage

Out of the box, Vagabond is configured to use a MySQL database in `config/database.php`. As with Laravel, you can [configure your connections](https://laravel.com/docs/5.5/database#configuration) and database drivers of choice, as well as keeping credentials safe in your `.env` file.

To create a migration, use the `make:migration` Nomad command.

```
php nomad make:migration create_travellers_table
```

You can check the status of your run and pending migrations using the `status` command.

```
php nomad migrate:status
```

Any pending migrations can be run using the `migrate` command.

```
php nomad migrate
```

For further information on the available commands and their functions, be sure to check out Laravel's [migration documentation](https://laravel.com/docs/5.5/migrations).

## Using Vagabond in Laravel applications

As Vagabond makes use of Laravel's package auto-discovery, you can easily include it in any application that access the database which it manages, by requiring the repository as a package.

In doing so, your Laravel application will be able to access the migrations, making it very simple to use them in your test environment, whilst still managing your production database in a standalone fashion. This also means that your database could be separately versioned and even managed by database administrators independently of your development process.

**Note:** Be sure not to call the `nomad` console application within your Laravel app as it will not run correctly. When ready, you can use the usual Artisan migrate tools.

You'll first want to update your `composer.json` file to reflect a package name relevant to your project by updating the `name` property.

If you're not using [Packagist](https://packagist.org) to share your migrations, you may need to configure a path or vcs repository as well. You can learn more about this in the Composer [repositories documentation](https://getcomposer.org/doc/05-repositories.md#hosting-your-own).

As Laravel does not package its `Foundation` components, Vagabond uses a fork from [`laravel-zero`](https://github.com/laravel-zero/foundation). In order to use Vagabond within your Laravel application, you'll need to add a Composer `pre-autoload-dump` script, which will help you avoid conflicts with your application's `Foundation` components, and those pulled in by [Nomad](https://github.com/michaeldyrynda/nomad).

```json
{
    "scripts": {
        "pre-autoload-dump": [
            "Dyrynda\\Nomad\\ComposerScripts::preAutoloadDump"
        ]
    }
}
```

## Credits

Special thanks to [Nuno Maduro](https://twitter.com/enunomaduro) for the work he has done with [Laravel Zero](http://laravel-zero.com), which helped pave the way for me to finally bring this project to life.

## Support

If you are having general issues with this package, feel free to contact me on [Twitter](https://twitter.com/michaeldyrynda).

If you believe you have found an issue, please report it using the [GitHub issue tracker](https://github.com/michaeldyrynda/vagabond/issues), or better yet, fork the repository and submit a pull request.

If you're using this package, I'd love to hear your thoughts. Thanks!
