# Installation

```sh 
git clone https://github.com/lampdev/trial.git
```
1. allow write access to the user who are you going to launch the script from OR create `templates_c` directory with write access for the user. It allows Smarty to store compiled templates there
2. composer update
3. composer dumpautoload -o (we use libraries with PSR-0 and PSR-4 autoload in this project)
4. load the initial .sql file with the tables structure (data.sql)
5. change the DB connection values in init.php
6. 
```sh 
php generator.php
```

This is to generate test data

7. php index.php

As a result you will get output.pdf in the same folder. This can take a while as the images are being fetched from the URLs


### Version
0.0.1

### Todo's
* Add .gitignore
* move settings to config (probably YAML?)

License
----

GPL3


