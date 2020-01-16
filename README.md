# PHP Fast
PHP Fast is a mini framework use to create APIs in days.


## Folder Structure
PHP Fast provides very easy and simple folder structure to work with, where you will have all basic necessary functions.

- public
- config
  - config.dev.php
  - config.php
  - config.prod.php
  - env.php
- app
  - predefined
    - Database.php
    - Model.php
    - Validate.php
  - user-defined


## Convers below endpoints

Example : Lets take an example of entity like `Student`

1. /students        : GET       Returns all students
2. /student/:id     : GET       Returns one student
3. /student         : POST      Save student
4. /student/:id     : DELETE    Delete student by ID
5. /student/:id     : PUT       Update student by ID

