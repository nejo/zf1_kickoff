[production]
phpSettings.display_startup_errors = 0
phpSettings.display_errors = 0
includePaths.library = APPLICATION_PATH "/../library"
bootstrap.path = APPLICATION_PATH "/Bootstrap.php"
bootstrap.class = "Bootstrap"
appnamespace = "Application"

resources.frontController.controllerDirectory = APPLICATION_PATH "/controllers"
resources.frontController.params.displayExceptions = 0
resources.frontController.plugins[] = "Application_Plugin_Language"

resources.layout.layoutPath = APPLICATION_PATH "/layouts/scripts/"

resources.view[] =
resources.view.encoding = "UTF-8"

resources.db.adapter = "PDO_MYSQL"
resources.db.params.host = "localhost"
resources.db.params.username = ""
resources.db.params.password = ""
resources.db.params.dbname = ""
resources.db.params.charset = "utf8"        ; This will automatically call: database.params.driver_options.PDO::MYSQL_ATTR_INIT_COMMAND = "SET NAMES utf8"

resources.cachemanager.languages.frontend.name = Core
resources.cachemanager.languages.frontend.customFrontendNaming = false
resources.cachemanager.languages.frontend.options.lifetime = 7200
resources.cachemanager.languages.frontend.options.automatic_serialization = true
resources.cachemanager.languages.backend.name = File
resources.cachemanager.languages.backend.customBackendNaming = false
resources.cachemanager.languages.backend.options.cache_dir = "/path/to/cache"
resources.cachemanager.languages.frontendBackendAutoload = false

resources.translate.adapter = gettext
resources.translate.content = APPLICATION_PATH "/../languages"
;resources.translate.cache = "languages"
resources.translate.options.scan = 'directory'
resources.translate.options.locale = auto
resources.translate.options.disableNotices = 1
resources.translate.options.clear = 1
resources.translate.options.logUntranslated = false
resources.translate.options.registry_key = "Zend_Translate"

[staging : production]

[testing : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1

[development : production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1
resources.frontController.params.displayExceptions = 1
