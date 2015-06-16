## Details
- Rest API built using Laravel 5.
- Makes use of the "pingpong/modules" package to enable modular architecture.

## Installation

- Clone Repo
- Install dependencies via composer.
- Run Migrations via artisan
- Run module migrations via artisan (see http://sky.pingpong-labs.com/docs/2.0/testing#example-usage)

## Tests

- Module tests can be ran separately via "s"


## TO DO
- Write tests for authentication.
- Move foreign keys into separate migrations.
- Data modelling for products.
- Set up production site.
- Set up automated deployment.


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

Aliases for common queries:

To make the API experience more pleasant, consider packaging up sets of conditions into easily accessible RESTful paths. e.g products/recently_created

