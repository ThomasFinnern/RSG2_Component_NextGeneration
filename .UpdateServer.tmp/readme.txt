Extension

The extension server type allows developers to define an extension's manifest to pull updates from a single extension's manifest. All collection manifests eventually point to this XML file. All updates in this file must be defined after an <updates> tag at the beginning of the file. The below example is the update definition for the Joomla! 1.7.0 release:

 <update>
    <name>Joomla! 1.7</name>
    <description>Joomla! 1.7 CMS</description>
    <element>joomla</element>
    <type>file</type>
    <version>1.7.0</version>
    <infourl title="Joomla!">http://www.joomla.org/</infourl>
    <downloads>
        <downloadurl type="full" format="zip">http://joomlacode.org/gf/download/frsrelease/15279/66552/Joomla_1.6.5_to_1.7.0_Package.zip</downloadurl>
    </downloads>
    <tags>
        <tag>stable</tag>
    </tags>
    <maintainer>Sam Moffatt</maintainer>
    <maintainerurl>http://sammoffatt.com.au</maintainerurl>
    <section>Testing</section>
    <targetplatform name="joomla" version="1.6"/>
 </update>

The following section describes the elements of a single update entity.

    name - The name of the extension, this name will appear in the Name column of the Extension Manager's Update view (required)
    description - A short description of the extension (optional) -- if you choose to use <![CDATA[]]>, double-quotes will break the HTML formatting. Use single quotes with your HTML entities.
    element - The installed name of the extension (required). For plugins, this needs to be same as plugin attribute value for main file in plugin manifest. For <filename plugin="pluginname">pluginname.php</filename>, element value should be pluginname.
    type - The type of extension (component, module, plugin, etc.) (required)
    folder - Specific to plugins, this tag describes the type of plugin being updated (content, system, etc.) (required for plugins)
    client - Required for modules and templates as of 3.2.0. - The client ID of the extension, which can be found by looking inside the #__extensions table. To date, use 0 for "site" and 1 for "administrator". Plugins and front-end modules are automatically installed with a client of 0 (site), but you will need to specify the client in an update or it will default to 1 (administrator) and then found update would not be shown because it would not match any extension. Components are automatically installed with a client of 1, which is currently the default.
        Warning: The tag name is <client> for Joomla! 2.5 and <client_id> for 1.6 and 1.7. If you use <client_id> (rather than <client>) on a 2.5 site, it will be ignored.
    version - The version of the release (required)
    infourl - A URL to point users to containing information about the update (optional) (In CMS 2.5, if set, this URL will be displayed in the update view)
    downloads - The section which lists all download locations
        downloadurl - The URL to download the extension from; the <downloadurl> tag has two required parameters:
            type - The type of package (full or upgrade)
            format - The format of the package (zip, tar, etc.)
        NB - there must be no newline before or after the URL; it needs to all be on one line or you will get Error connecting to the server: malformed when the update is run
    tags - A list of tags relevant to this version. Joomla! 3.4 and later uses this to determine the stability level of the update. The valid tags are:
        dev: Development versions, very unstable and pre-alpha (e.g. nightly builds)
        alpha: Alpha quality software (features not implemented, show-stopper bugs)
        beta: Beta quality software (all features implemented, show-stopper bugs possible, minor bugs almost certain)
        rc: Release Candidate quality software (no show-stopper bugs, minor bugs may still be present)
        stable: Production quality software All other tags are currently ignored. If you provide more than one tag containing one of the aforementioned stability keywords only the LAST tag will be taken into account. If you do not provide any tags Joomla! will assume it is a stable version.
    maintainer - The name of the extension maintainer (similar to the <author> tag in a manifest) (optional)
    maintainerurl - The website of the extension maintainer (similar to the <authorUrl> tag in a manifest) (optional)
    section - Optional (unknown use)
    targetplatform - A tag to define platform requirements, requires the following elements?
        name - The name of the platform dependency; as of this writing, it should ONLY be "joomla"
        version - The version of Joomla! the extension supports
        min_dev_level and max_dev_level - These attributes were added in 3.0.1 to allow you to select a target platform based on the developer level ("z" in x.y.z). They are optional. You can specify either one or both. If omitted, all developer levels are matched. For example, the following matches versions 4.0.0 and 4.0.1. <targetplatform name="joomla" version="4.0" min_dev_level="0" max_dev_level="1"/>
            Note: If your extension is Joomla! 2.5 and/or 3.1 compatible, you will be required to have separate <update> definitions for each version due to the manner in which the updater checks the version if you specify a number. However to show your extension on all Joomla versions that support automatic updates add <targetplatform name="joomla" version=".*"/>. If you want your extension to show on all Joomla 3.x versions then rather than specifying a version in the version tag add in <targetplatform name="joomla" version="3.[012345]"/>. This will show the update to all 3.x versions.
    php_minimum - Beginning with 3.2.2, a minimum supported PHP version can be supplied in the update stream. If the server does not meet the minimum, a message is displayed to the user advising that an update is available but cannot be installed due to unsupported requirements.

A separate <update> definition will be required for each version of your extension you release.

The values of element, type, client_id and folder should match those in the table #__extensions.

Important for plugins: Plugins have to include <folder> and <client> elements to work properly



Troubleshooting

    SQL update script is not executed during update.

    If the SQL update script (for example, in the folder sql/updates/mysql) does not get executed during the update process, it could be because there is no version number in the #__schemas table for this extension prior to the update. This value is determined by the last script name in the SQL updates folder. If this value is blank, no SQL scripts will be executed during that update cycle. To make sure this value is set correctly, make sure you have a SQL script in this folder with its name as the version number (for example, 1.2.3.sql if the version is 1.2.3). The file can be empty or just have a SQL comment line. This should be done in the old version -- the one before the update. Alternatively, you can add this value to the #__schemas using a SQL query.

Supporting Tools

Maintaining your update server files can be difficult depending on the manner in which you set up your files. An extension which can help you to maintain this is the Akeeba Release System, available free of charge from https://www.akeebabackup.com






