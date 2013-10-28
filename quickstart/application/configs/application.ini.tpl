[production]
phpSettings.display_startup_errors = 0
phpSettings.display_errors = 0
includePaths.library = APPLICATION_PATH "/../library"
bootstrap.path = APPLICATION_PATH "/Bootstrap.php"
bootstrap.class = "Bootstrap"
appnamespace = "Application"
resources.frontController.controllerDirectory = APPLICATION_PATH "/controllers"
resources.frontController.params.displayExceptions = 0
;resources.frontController.plugins[] = "Class_Name"
resources.layout.layoutPath = APPLICATION_PATH "/layouts/scripts/"
resources.view[] = 
resources.view.encoding = "UTF-8"
resources.db.adapter = "PDO_MYSQL"
resources.db.params.charset = "utf8"        ; This will automatically call: database.params.driver_options.PDO::MYSQL_ATTR_INIT_COMMAND = "SET NAMES utf8"
resources.db.params.host = "localhost"
resources.db.params.username = "root"
resources.db.params.password = ""
resources.db.params.dbname = "zf1_kickoff"


[staging : production]

[testing : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1

[development : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1
resources.frontController.params.displayExceptions = 1
