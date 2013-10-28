[production]
phpSettings.display_startup_errors = 1
phpSettings.display_errors = 1

; BOOTSTRAP
includePaths.library = APPLICATION_PATH "/../library"
bootstrap.path = APPLICATION_PATH "/Bootstrap.php"
bootstrap.class = "Bootstrap"
appnamespace = "Application"
autoloaderNamespaces[] = "Base_"

; FRONTCONTROLLER
resources.frontController.controllerDirectory = APPLICATION_PATH "/controllers"
resources.frontController.params.displayExceptions = 0
resources.frontController.plugins[] = "Application_Plugin_Language"

; VIEW
resources.layout.layoutPath = APPLICATION_PATH "/layouts/scripts/"
resources.view[] =
resources.view.encoding = "UTF-8"

; DATABASE
resources.db.adapter = "PDO_MYSQL"
resources.db.params.host = "localhost"
resources.db.params.username = ""
resources.db.params.password = ""
resources.db.params.dbname = ""
resources.db.params.charset = "utf8"        ; This will automatically call: database.params.driver_options.PDO::MYSQL_ATTR_INIT_COMMAND = "SET NAMES utf8"

; CACHE
resources.cachemanager.cache.frontend.name = Core
resources.cachemanager.cache.frontend.customFrontendNaming = false
resources.cachemanager.cache.frontend.options.lifetime = 7200
resources.cachemanager.cache.frontend.options.automatic_serialization = true
resources.cachemanager.cache.backend.name = File
resources.cachemanager.cache.backend.customBackendNaming = false
resources.cachemanager.cache.backend.options.cache_dir = APPLICATION_PATH "/../cache"
resources.cachemanager.cache.frontendBackendAutoload = false
resources.cachemanager.cache.isDefaultMetadataCache = true
resources.cachemanager.cache.isDefaultTranslateCache = true
resources.cachemanager.cache.isDefaultLocaleCache = true

; LOCALE
resources.locale.default = "en"
resources.locale.force = false
resources.locale.cache = "locale"
resources.locale.registry_key = "Zend_Locale"

; TRANSLATE
resources.translate.adapter = gettext
resources.translate.content = APPLICATION_PATH "/../languages"
resources.translate.cache = "cache"
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
