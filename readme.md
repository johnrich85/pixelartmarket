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

Query string parser

- New class, config driven "ApiParameterBuilder". Config defines which params map to which class
- New factory class to instantiate:
 - QSParam (base)
 - sort -> returns array("name"=>"fieldname", order="ASC")
 - field_name -> returns array('name', 'value')... where()->orWhere()
 - q -> returns array('searchterm1', 'searchterm2')
 - fields => returns ('field1', 'field2', 'field3')

 ##TO DO
 - Handle exceptions
 - Master class currently instantiating dependencies, use factory instead?
 - Add sort modifier - DONE
 - Create FilterModifier - DONE
 - Create FieldSelectionModifier - DONE
 - Add list of modifiers to config - iterate over, instantiate and use. (makes it possible
 to add modifiers without updating EQM class)
 - Unit tests


## Notes
 - Need to support query string params

Sort:
?sort=-priority,created_at

Field Filter:
?field_fieldName=value

General Search (lucene?):
?q=search term

Field selection:
?fields=id,name, description

Pretty print:
?pretty=true

Aliases for common queries:

To make the API experience more pleasant, consider packaging up sets of conditions into easily accessible RESTful paths. e.g products/recently_created

