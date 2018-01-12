<p align="center">
    <h1>Vagabond</h1>
</p>

## About Vagabond

Vagabond is a project that lets you leverage [Nomad](https://github.com/michaeldyrynda/nomad) - Laravel-style database migrations wherever they may roam.

Nomad gives you the power of Laravel's [database migrations](https://laravel.com/docs/5.5/migrations) without the need for a full Laravel installation.

This is particularly useful where you have multiple applications accessing a single database, but you aren't sure which should be responsible for managing the database schema. By extracting your migrations to a separate repository, you can maintain full version control over your database schema, without worrying about different applications trying to run the migrations on the same database.

In addition, you also have the ability to use those centralised migrations within your application test suite much more easily, without having to either duplicate the migrations or run against your own copy of the database.

## Installation

In order to create a new Vagabond project, you can use [Composer](https://getcomposer.org).

```
composer create-project dyrynda/vagabond wanderer
```

Once installed, you will have access to the `nomad` application, a default configuration to work with an sqlite database, and a `MigrationServiceProvider` that will be automatically loaded, should you choose to use your Vagabond project to share your migrations with other Laravel applications.

## Usage

Before you can begin to use Nomad, you must first install it.

```
php nomad migrate:install
```

This will setup the migration database table, which is used to track which migrations have been run and which ones are pending.

To create a migration, use the `make:migration` Nomad command.

```
php nomad make:migration create_travellers_table
```

You can check the status of your ran and pending migrations using the `status` command.

```
php nomad migrate:status
```

Any pending migrations can be run using the `migrate` command.

```
php nomad migrate
```

For further information on the available commands and their functions, be sure to check out Laravel's [migration documentation](https://laravel.com/docs/5.5/migrations).

## Credits

Special thanks to [Nuno Maduro](https://twitter.com/enunomaduro) for the work he has done with [Laravel Zero](http://laravel-zero.com), which helped pave the way for me to finally bring this project to life.

## Support

If you are having general issues with this package, feel free to contact me on [Twitter](https://twitter.com/michaeldyrynda).

If you believe you have found an issue, please report it using the [GitHub issue tracker](https://github.com/michaeldyrynda/vagabond/issues), or better yet, fork the repository and submit a pull request.

If you're using this package, I'd love to hear your thoughts. Thanks!
