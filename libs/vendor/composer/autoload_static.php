<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit791b9b7611855ca31a6dd8867a8c964d
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BLOG\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BLOG\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/src/app',
            1 => __DIR__ . '/../../..' . '/src/favicon',
            2 => __DIR__ . '/../../..' . '/web',
        ),
    );

    public static $classMap = array (
        'Audit' => __DIR__ . '/..' . '/bcosca/fatfree-core/audit.php',
        'Auth' => __DIR__ . '/..' . '/bcosca/fatfree-core/auth.php',
        'Base' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Basket' => __DIR__ . '/..' . '/bcosca/fatfree-core/basket.php',
        'Bcrypt' => __DIR__ . '/..' . '/bcosca/fatfree-core/bcrypt.php',
        'CLI\\Agent' => __DIR__ . '/..' . '/bcosca/fatfree-core/cli/ws.php',
        'CLI\\WS' => __DIR__ . '/..' . '/bcosca/fatfree-core/cli/ws.php',
        'Cache' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DB\\Cortex' => __DIR__ . '/..' . '/ikkez/f3-cortex/lib/db/cortex.php',
        'DB\\CortexCollection' => __DIR__ . '/..' . '/ikkez/f3-cortex/lib/db/cortex.php',
        'DB\\CortexQueryParser' => __DIR__ . '/..' . '/ikkez/f3-cortex/lib/db/cortex.php',
        'DB\\Cursor' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/cursor.php',
        'DB\\Jig' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/jig.php',
        'DB\\Jig\\Mapper' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/jig/mapper.php',
        'DB\\Jig\\Session' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/jig/session.php',
        'DB\\Mongo' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/mongo.php',
        'DB\\Mongo\\Mapper' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/mongo/mapper.php',
        'DB\\Mongo\\Session' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/mongo/session.php',
        'DB\\SQL' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/sql.php',
        'DB\\SQL\\Column' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'DB\\SQL\\DB_Utils' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'DB\\SQL\\Mapper' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/sql/mapper.php',
        'DB\\SQL\\Schema' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'DB\\SQL\\Session' => __DIR__ . '/..' . '/bcosca/fatfree-core/db/sql/session.php',
        'DB\\SQL\\TableBuilder' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'DB\\SQL\\TableCreator' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'DB\\SQL\\TableModifier' => __DIR__ . '/..' . '/ikkez/f3-schema-builder/lib/db/sql/schema.php',
        'F3' => __DIR__ . '/..' . '/bcosca/fatfree-core/f3.php',
        'ISO' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Image' => __DIR__ . '/..' . '/bcosca/fatfree-core/image.php',
        'Log' => __DIR__ . '/..' . '/bcosca/fatfree-core/log.php',
        'Magic' => __DIR__ . '/..' . '/bcosca/fatfree-core/magic.php',
        'Markdown' => __DIR__ . '/..' . '/bcosca/fatfree-core/markdown.php',
        'Matrix' => __DIR__ . '/..' . '/bcosca/fatfree-core/matrix.php',
        'Prefab' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Preview' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Registry' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'SMTP' => __DIR__ . '/..' . '/bcosca/fatfree-core/smtp.php',
        'Session' => __DIR__ . '/..' . '/bcosca/fatfree-core/session.php',
        'Template' => __DIR__ . '/..' . '/bcosca/fatfree-core/template.php',
        'Test' => __DIR__ . '/..' . '/bcosca/fatfree-core/test.php',
        'UTF' => __DIR__ . '/..' . '/bcosca/fatfree-core/utf.php',
        'View' => __DIR__ . '/..' . '/bcosca/fatfree-core/base.php',
        'Web' => __DIR__ . '/..' . '/bcosca/fatfree-core/web.php',
        'Web\\Geo' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/geo.php',
        'Web\\Google\\Recaptcha' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/google/recaptcha.php',
        'Web\\Google\\StaticMap' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/google/staticmap.php',
        'Web\\OAuth2' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/oauth2.php',
        'Web\\OpenID' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/openid.php',
        'Web\\Pingback' => __DIR__ . '/..' . '/bcosca/fatfree-core/web/pingback.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit791b9b7611855ca31a6dd8867a8c964d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit791b9b7611855ca31a6dd8867a8c964d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit791b9b7611855ca31a6dd8867a8c964d::$classMap;

        }, null, ClassLoader::class);
    }
}
