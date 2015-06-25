## Details
- Rest API built using Laravel 5.
- Makes use of the "pingpong/modules" package to enable modular architecture.

## Installation

- Clone Repo
- Install dependencies via composer (composer.phar install)
- Run Migrations via artisan (php artisan migrate)
- Run module migrations via artisan (php artisan module:migrate, see http://sky.pingpong-labs.com/docs/2.0/testing#example-usage)

## Tests

- Module tests can be ran separately via "phpunit --configuration module-test.xml"


## TO DO
- Write tests for authentication.
- Move foreign keys into separate migrations.
- Data modelling for products & finish api.
- Data modelling for categories, using nested set pattern.
- Set up production site.
- Set up automated deployment.
- Add easily accessible RESTful paths. e.g products/recently_created


 ##TO DO (query string processor pacakge)
 - Handle exceptions
 - Master class currently instantiating dependencies, use factory instead?  - DONE
 - Add sort modifier - DONE
 - Create FilterModifier - DONE
 - Create FieldSelectionModifier - DONE
 - Add list of modifiers to config - iterate over, instantiate and use. (makes it possible
 to add modifiers without updating EQM class)  - DONE
 - Rename the library (query modifier doesn't communicate the purpose)
 - Need to add page/per page param handlers - DONE
 - Unit tests

