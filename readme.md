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

## Notes
 - Need to support query string params

Sort:
?sort=-priority,created_at

Filtering:
?field=value

Search (lucene?):
?q=search term

Field selection:
?fields=id,name, description

Pretty print:
?pretty=true

Aliases for common queries:

To make the API experience more pleasant, consider packaging up sets of conditions into easily accessible RESTful paths. e.g products/recently_created

