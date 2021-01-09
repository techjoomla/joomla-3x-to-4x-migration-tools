<?php
/**
 * @package     TJScripts
 * @subpackage  namespaces
 *
 * @author      Manoj L, Ankush M <extensions@techjoomla.com>
 * @copyright   Copyright (C) 2009 - 2020 Techjoomla. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

error_reporting(0);
error_reporting(E_ALL);

/**
 * Script class for using namespaces added in Joomla 3.6.x ownards
 *
 * @since  1.0.0
 */
class J3Namespaces
{
	/**
	 * Constructor
	 *
	 * @param   string  $directory  Directory path	 *
	 */
	public function __construct($directory)
	{
		$this->sourceDir = $directory;
		$this->processedCount = 0;
		$this->updatedLinesCount = 0;

		$this->nameSpaces = array(
			// From Joomla 3.6 to 3.9.x
			'JWebClient'                        => 'use Joomla\Application\Web\WebClient',
			'JWeb'                              => 'use Joomla\CMS\Application\WebApplication',
			'JViewLegacy'                       => 'use Joomla\CMS\MVC\View\HtmlView',
			'JViewCategoryfeed'                 => 'use Joomla\CMS\MVC\View\CategoryFeedView',
			'JViewCategory'                     => 'use Joomla\CMS\MVC\View\CategoryView',
			'JViewCategories'                   => 'use Joomla\CMS\MVC\View\CategoriesView',
			'JVersion'                          => 'use Joomla\CMS\Version',
			'JUtility'                          => 'use Joomla\CMS\Utility\Utility',
			'JUserWrapperHelper'                => 'use Joomla\CMS\User\UserWrapper',
			'JUserHelper'                       => 'use Joomla\CMS\User\UserHelper',
			'JUser'                             => 'use Joomla\CMS\User\User',
			'JUri'                              => 'use Joomla\CMS\Uri\Uri',
			'JUpdaterExtension'                 => 'use Joomla\CMS\Updater\Adapter\ExtensionAdapter',
			'JUpdaterCollection'                => 'use Joomla\CMS\Updater\Adapter\CollectionAdapter',
			'JUpdater'                          => 'use Joomla\CMS\Updater\Updater',
			'JUpdateAdapter'                    => 'use Joomla\CMS\Updater\UpdateAdapter',
			'JUpdate'                           => 'use Joomla\CMS\Updater\Update',
			'JUcmType'                          => 'use Joomla\CMS\UCM\UCMType',
			'JUcmContent'                       => 'use Joomla\CMS\UCM\UCMContent',
			'JUcmBase'                          => 'use Joomla\CMS\UCM\UCMBase',
			'JUcm'                              => 'use Joomla\CMS\UCM\UCM',
			'JToolbarHelper'                    => 'use Joomla\CMS\Toolbar\ToolbarHelper',
			'JToolbarButtonStandard'            => 'use Joomla\CMS\Toolbar\Button\StandardButton',
			'JToolbarButtonSlider'              => 'use Joomla\CMS\Toolbar\Button\SliderButton',
			'JToolbarButtonSeparator'           => 'use Joomla\CMS\Toolbar\Button\SeparatorButton',
			'JToolbarButtonPopup'               => 'use Joomla\CMS\Toolbar\Button\PopupButton',
			'JToolbarButtonLink'                => 'use Joomla\CMS\Toolbar\Button\LinkButton',
			'JToolbarButtonHelp'                => 'use Joomla\CMS\Toolbar\Button\HelpButton',
			'JToolbarButtonCustom'              => 'use Joomla\CMS\Toolbar\Button\CustomButton',
			'JToolbarButtonConfirm'             => 'use Joomla\CMS\Toolbar\Button\ConfirmButton',
			'JToolbarButton'                    => 'use Joomla\CMS\Toolbar\ToolbarButton',
			'JToolbar'                          => 'use Joomla\CMS\Toolbar\Toolbar',
			'JText'                             => 'use Joomla\CMS\Language\Text',
			'JTableViewlevel'                   => 'use Joomla\CMS\Table\ViewLevel',
			'JTableUsergroup'                   => 'use Joomla\CMS\Table\Usergroup',
			'JTableUser'                        => 'use Joomla\CMS\Table\User',
			'JTableUpdatesite'                  => 'use Joomla\CMS\Table\UpdateSite',
			'JTableUpdate'                      => 'use Joomla\CMS\Table\Update',
			'JTableUcm'                         => 'use Joomla\CMS\Table\Ucm',
			'JTableObserverTags'                => 'use Joomla\CMS\Table\Observer\Tags',
			'JTableObserverContenthistory'      => 'use Joomla\CMS\Table\Observer\ContentHistory',
			'JTableObserver'                    => 'use Joomla\CMS\Table\Observer\AbstractObserver',
			'JTableNested'                      => 'use Joomla\CMS\Table\Nested',
			'JTableModule'                      => 'use Joomla\CMS\Table\Module',
			'JTableMenuType'                    => 'use Joomla\CMS\Table\MenuType',
			'JTableMenu'                        => 'use Joomla\CMS\Table\Menu',
			'JTableLanguage'                    => 'use Joomla\CMS\Table\Language',
			'JTableInterface'                   => 'use Joomla\CMS\Table\TableInterface',
			'JTableExtension'                   => 'use Joomla\CMS\Table\Extension',
			'JTableCorecontent'                 => 'use Joomla\CMS\Table\CoreContent',
			'JTableContenttype'                 => 'use Joomla\CMS\Table\ContentType',
			'JTableContenthistory'              => 'use Joomla\CMS\Table\ContentHistory',
			'JTableContent'                     => 'use Joomla\CMS\Table\Content',
			'JTableCategory'                    => 'use Joomla\CMS\Table\Category',
			'JTableAsset'                       => 'use Joomla\CMS\Table\Asset',
			'JTable'                            => 'use Joomla\CMS\Table\Table',
			'JStringPunycode'                   => 'use Joomla\CMS\String\PunycodeHelper',
			'JStringNormalise'                  => 'use Joomla\String\Normalise',
			'JStringInflector'                  => 'use Joomla\String\Inflector',
			'JStringController'                 => 'use Joomla\CMS\Filesystem\Support\StringController',
			'JStreamString'                     => 'use Joomla\CMS\Filesystem\Streams\StreamString',
			'JStream'                           => 'use Joomla\CMS\Filesystem\Stream',
			'JSessionExceptionUnsupported'      => 'use Joomla\CMS\Session\Exception\UnsupportedStorageException',
			'JSession'                          => 'use Joomla\CMS\Session\Session',
			'JSearchHelper'                     => 'use Joomla\CMS\Helper\SearchHelper',
			'JSchemaChangeset'                  => 'use Joomla\CMS\Schema\ChangeSet',
			'JSchemaChangeitemSqlsrv'           => 'use Joomla\CMS\Schema\ChangeItem\SqlsrvChangeItem',
			'JSchemaChangeitemPostgresql'       => 'use Joomla\CMS\Schema\ChangeItem\PostgresqlChangeItem',
			'JSchemaChangeitemMysql'            => 'use Joomla\CMS\Schema\ChangeItem\MysqlChangeItem',
			'JSchemaChangeitem'                 => 'use Joomla\CMS\Schema\ChangeItem',
			'JRules'                            => 'use Joomla\CMS\Access\Rules',
			'JRule'                             => 'use Joomla\CMS\Access\Rule',
			'JRouterSite'                       => 'use Joomla\CMS\Router\SiteRouter',
			'JRouterAdministrator'              => 'use Joomla\CMS\Router\AdministratorRouter',
			'JRouter'                           => 'use Joomla\CMS\Router\Router',
			'JRoute'                            => 'use Joomla\CMS\Router\Route',
			'JResponseJson'                     => 'use Joomla\CMS\Response\JsonResponse',
			'JRegistryFormatXml'                => 'use Joomla\Registry\Format\Xml',
			'JRegistryFormatPhp'                => 'use Joomla\Registry\Format\Php',
			'JRegistryFormatJson'               => 'use Joomla\Registry\Format\Json',
			'JRegistryFormatIni'                => 'use Joomla\Registry\Format\Ini',
			'JRegistryFormat'                   => 'use Joomla\Registry\AbstractRegistryFormat',
			'JRegistry'                         => 'use Joomla\Registry\Registry',
			'JProfiler'                         => 'use Joomla\CMS\Profiler\Profiler',
			'JPluginHelper'                     => 'use Joomla\CMS\Plugin\PluginHelper',
			'JPlugin'                           => 'use Joomla\CMS\Plugin\CMSPlugin',
			'JPathwaySite'                      => 'use Joomla\CMS\Pathway\SitePathway',
			'JPathway'                          => 'use Joomla\CMS\Pathway\Pathway',
			'JPath'                             => 'use Joomla\CMS\Filesystem\Path',
			'JPaginationObject'                 => 'use Joomla\CMS\Pagination\PaginationObject',
			'JPagination'                       => 'use Joomla\CMS\Pagination\Pagination',
			'JOpenSearchUrl'                    => 'use Joomla\CMS\Document\Opensearch\OpensearchUrl',
			'JOpenSearchImage'                  => 'use Joomla\CMS\Document\Opensearch\OpensearchImage',
			'JObject'                           => 'use Joomla\CMS\Object\CMSObject',
			'JModuleHelper'                     => 'use Joomla\CMS\Helper\ModuleHelper',
			'JModelList'                        => 'use Joomla\CMS\MVC\Model\ListModel',
			'JModelLegacy'                      => 'use Joomla\CMS\MVC\Model\BaseDatabaseModel',
			'JModelItem'                        => 'use Joomla\CMS\MVC\Model\ItemModel',
			'JModelForm'                        => 'use Joomla\CMS\MVC\Model\FormModel',
			'JModelAdmin'                       => 'use Joomla\CMS\MVC\Model\AdminModel',
			'JMicrodata'                        => 'use Joomla\CMS\Microdata\Microdata',
			'JMenuSite'                         => 'use Joomla\CMS\Menu\SiteMenu',
			'JMenuItem'                         => 'use Joomla\CMS\Menu\MenuItem',
			'JMenuAdministrator'                => 'use Joomla\CMS\Menu\AdministratorMenu',
			'JMenu'                             => 'use Joomla\CMS\Menu\AbstractMenu',
			'JMailWrapperHelper'                => 'use Joomla\CMS\Mail\MailWrapper',
			'JMailHelper'                       => 'use Joomla\CMS\Mail\MailHelper',
			'JMail'                             => 'use Joomla\CMS\Mail\Mail',
			'JLogLoggerW3c'                     => 'use Joomla\CMS\Log\Logger\W3cLogger',
			'JLogLoggerSyslog'                  => 'use Joomla\CMS\Log\Logger\SyslogLogger',
			'JLogLoggerMessagequeue'            => 'use Joomla\CMS\Log\Logger\MessagequeueLogger',
			'JLogLoggerFormattedtext'           => 'use Joomla\CMS\Log\Logger\FormattedtextLogger',
			'JLogLoggerEcho'                    => 'use Joomla\CMS\Log\Logger\EchoLogger',
			'JLogLoggerDatabase'                => 'use Joomla\CMS\Log\Logger\DatabaseLogger',
			'JLogLoggerCallback'                => 'use Joomla\CMS\Log\Logger\CallbackLogger',
			'JLogLogger'                        => 'use Joomla\CMS\Log\Logger',
			'JLogger'                           => 'use Joomla\CMS\Log\Logger',
			'JLogEntry'                         => 'use Joomla\CMS\Log\LogEntry',
			'JLog'                              => 'use Joomla\CMS\Log\Log',
			'JLibraryHelper'                    => 'use Joomla\CMS\Helper\LibraryHelper',
			'JLDAP'                             => 'use Joomla\Ldap\LdapClient',
			'JLayoutHelper'                     => 'use Joomla\CMS\Layout\LayoutHelper',
			'JLayoutFile'                       => 'use Joomla\CMS\Layout\FileLayout',
			'JLayoutBase'                       => 'use Joomla\CMS\Layout\BaseLayout',
			'JLayout'                           => 'use Joomla\CMS\Layout\LayoutInterface',
			'JLanguageWrapperTransliterate'     => 'use Joomla\CMS\Language\Wrapper\TransliterateWrapper',
			'JLanguageWrapperText'              => 'use Joomla\CMS\Language\Wrapper\JTextWrapper',
			'JLanguageWrapperHelper'            => 'use Joomla\CMS\Language\Wrapper\LanguageHelperWrapper',
			'JLanguageTransliterate'            => 'use Joomla\CMS\Language\Transliterate',
			'JLanguageStemmerPorteren'          => 'use Joomla\CMS\Language\Stemmer\Porteren',
			'JLanguageStemmer'                  => 'use Joomla\CMS\Language\LanguageStemmer',
			'JLanguageMultilang'                => 'use Joomla\CMS\Language\Multilanguage',
			'JLanguageHelper'                   => 'use Joomla\CMS\Language\LanguageHelper',
			'JLanguageAssociations'             => 'use Joomla\CMS\Language\Associations',
			'JLanguage'                         => 'use Joomla\CMS\Language\Language',
			'JInstallerTemplate'                => 'use Joomla\CMS\Installer\Adapter\TemplateAdapter',
			'JInstallerScript'                  => 'use Joomla\CMS\Installer\InstallerScript',
			'JInstallerPlugin'                  => 'use Joomla\CMS\Installer\Adapter\PluginAdapter',
			'JInstallerPackage'                 => 'use Joomla\CMS\Installer\Adapter\PackageAdapter',
			'JInstallerModule'                  => 'use Joomla\CMS\Installer\Adapter\ModuleAdapter',
			'JInstallerManifestPackage'         => 'use Joomla\CMS\Installer\Manifest\PackageManifest',
			'JInstallerManifestLibrary'         => 'use Joomla\CMS\Installer\Manifest\LibraryManifest',
			'JInstallerManifest'                => 'use Joomla\CMS\Installer\Manifest',
			'JInstallerLibrary'                 => 'use Joomla\CMS\Installer\Adapter\LibraryAdapter',
			'JInstallerLanguage'                => 'use Joomla\CMS\Installer\Adapter\LanguageAdapter',
			'JInstallerHelper'                  => 'use Joomla\CMS\Installer\InstallerHelper',
			'JInstallerFile'                    => 'use Joomla\CMS\Installer\Adapter\FileAdapter',
			'JInstallerExtension'               => 'use Joomla\CMS\Installer\InstallerExtension',
			'JInstallerComponent'               => 'use Joomla\CMS\Installer\Adapter\ComponentAdapter',
			'JInstallerAdapterTemplate'         => 'use Joomla\CMS\Installer\Adapter\TemplateAdapter',
			'JInstallerAdapterPlugin'           => 'use Joomla\CMS\Installer\Adapter\PluginAdapter',
			'JInstallerAdapterPackage'          => 'use Joomla\CMS\Installer\Adapter\PackageAdapter',
			'JInstallerAdapterModule'           => 'use Joomla\CMS\Installer\Adapter\ModuleAdapter',
			'JInstallerAdapterLibrary'          => 'use Joomla\CMS\Installer\Adapter\LibraryAdapter',
			'JInstallerAdapterLanguage'         => 'use Joomla\CMS\Installer\Adapter\LanguageAdapter',
			'JInstallerAdapterFile'             => 'use Joomla\CMS\Installer\Adapter\FileAdapter',
			'JInstallerAdapterComponent'        => 'use Joomla\CMS\Installer\Adapter\ComponentAdapter',
			'JInstallerAdapter'                 => 'use Joomla\CMS\Installer\InstallerAdapter',
			'JInstaller'                        => 'use Joomla\CMS\Installer\Installer',
			'JInputJSON'                        => 'use Joomla\CMS\Input\Json',
			'JInputFiles'                       => 'use Joomla\CMS\Input\Files',
			'JInputCookie'                      => 'use Joomla\CMS\Input\Cookie',
			'JInputCli'                         => 'use Joomla\CMS\Input\Cli',
			'JInput'                            => 'use Joomla\CMS\Input\Input',
			'JImageFilterSmooth'                => 'use Joomla\Image\Filter\Smooth',
			'JImageFilterSketchy'               => 'use Joomla\Image\Filter\Sketchy',
			'JImageFilterNegate'                => 'use Joomla\Image\Filter\Negate',
			'JImageFilterEmboss'                => 'use Joomla\Image\Filter\Emboss',
			'JImageFilterEdgedetect'            => 'use Joomla\Image\Filter\Edgedetect',
			'JImageFilterContrast'              => 'use Joomla\Image\Filter\Contrast',
			'JImageFilterBrightness'            => 'use Joomla\Image\Filter\Brightness',
			'JImageFilterBackgroundfill'        => 'use Joomla\Image\Filter\Backgroundfill',
			'JImageFilter'                      => 'use Joomla\CMS\Image\ImageFilter',
			'JImage'                            => 'use Joomla\CMS\Image\Image',
			'JHttpWrapperFactory'               => 'use Joomla\CMS\Http\Wrapper\FactoryWrapper',
			'JHttpTransportStream'              => 'use Joomla\CMS\Http\Transport\StreamTransport',
			'JHttpTransportSocket'              => 'use Joomla\CMS\Http\Transport\SocketTransport',
			'JHttpTransportCurl'                => 'use Joomla\CMS\Http\Transport\CurlTransport',
			'JHttpTransport'                    => 'use Joomla\CMS\Http\TransportInterface',
			'JHttpResponse'                     => 'use Joomla\CMS\Http\Response',
			'JHttpFactory'                      => 'use Joomla\CMS\Http\HttpFactory',
			'JHttp'                             => 'use Joomla\CMS\Http\Http',
			'JHtml'                             => 'use Joomla\CMS\HTML\HTMLHelper',
			'JHelperUsergroups'                 => 'use Joomla\CMS\Helper\UserGroupsHelper',
			'JHelperTags'                       => 'use Joomla\CMS\Helper\TagsHelper',
			'JHelperRoute'                      => 'use Joomla\CMS\Helper\RouteHelper',
			'JHelperMedia'                      => 'use Joomla\CMS\Helper\MediaHelper',
			'JHelperContenthistory'             => 'use Joomla\CMS\Helper\ContentHistoryHelper',
			'JHelperContent'                    => 'use Joomla\CMS\Helper\ContentHelper',
			'JHelper'                           => 'use Joomla\CMS\Helper\CMSHelper',
			'JHelp'                             => 'use Joomla\CMS\Help\Help',
			'JFTP'                              => 'use Joomla\CMS\Client\FtpClient',
			'JFormWrapper'                      => 'use Joomla\CMS\Form\FormWrapper',
			'JFormRuleUsername'                 => 'use Joomla\CMS\Form\Rule\UsernameRule',
			'JFormRuleUrl'                      => 'use Joomla\CMS\Form\Rule\UrlRule',
			'JFormRuleTel'                      => 'use Joomla\CMS\Form\Rule\TelRule',
			'JFormRuleRules'                    => 'use Joomla\CMS\Form\Rule\RulesRule',
			'JFormRulePassword'                 => 'use Joomla\CMS\Form\Rule\PasswordRule',
			'JFormRuleOptions'                  => 'use Joomla\CMS\Form\Rule\OptionsRule',
			'JFormRuleNumber'                   => 'use Joomla\CMS\Form\Rule\NumberRule',
			'JFormRuleNotequals'                => 'use Joomla\CMS\Form\Rule\NotequalsRule',
			'JFormRuleEquals'                   => 'use Joomla\CMS\Form\Rule\EqualsRule',
			'JFormRuleEmail'                    => 'use Joomla\CMS\Form\Rule\EmailRule',
			'JFormRuleColor'                    => 'use Joomla\CMS\Form\Rule\ColorRule',
			'JFormRuleCaptcha'                  => 'use Joomla\CMS\Form\Rule\CaptchaRule',
			'JFormRuleCalendar'                 => 'use Joomla\CMS\Form\Rule\CalendarRule',
			'JFormRuleBoolean'                  => 'use Joomla\CMS\Form\Rule\BooleanRule',
			'JFormRule'                         => 'use Joomla\CMS\Form\FormRule',
			'JFormHelper'                       => 'use Joomla\CMS\Form\FormHelper',
			'JFormFieldUserState'               => 'use Joomla\CMS\Form\Field\UserstateField',
			'JFormFieldUserGroupList'           => 'use Joomla\CMS\Form\Field\UsergrouplistField',
			'JFormFieldUserActive'              => 'use Joomla\CMS\Form\Field\UseractiveField',
			'JFormFieldUser'                    => 'use Joomla\CMS\Form\Field\UserField',
			'JFormFieldTemplatestyle'           => 'use Joomla\CMS\Form\Field\TemplatestyleField',
			'JFormFieldTag'                     => 'use Joomla\CMS\Form\Field\TagField',
			'JFormFieldStatus'                  => 'use Joomla\CMS\Form\Field\StatusField',
			'JFormFieldRegistrationDateRange'   => 'use Joomla\CMS\Form\Field\RegistrationdaterangeField',
			'JFormFieldRedirect_Status'         => 'use Joomla\CMS\Form\Field\RedirectStatusField',
			'JFormFieldPlugin_Status'           => 'use Joomla\CMS\Form\Field\PluginstatusField',
			'JFormFieldOrdering'                => 'use Joomla\CMS\Form\Field\OrderingField',
			'JFormFieldModuletag'               => 'use Joomla\CMS\Form\Field\ModuletagField',
			'JFormFieldModulePosition'          => 'use Joomla\CMS\Form\Field\ModulepositionField',
			'JFormFieldModuleOrder'             => 'use Joomla\CMS\Form\Field\ModuleorderField',
			'JFormFieldMenuitem'                => 'use Joomla\CMS\Form\Field\MenuitemField',
			'JFormFieldMenu'                    => 'use Joomla\CMS\Form\Field\MenuField',
			'JFormFieldMedia'                   => 'use Joomla\CMS\Form\Field\MediaField',
			'JFormFieldLimitbox'                => 'use Joomla\CMS\Form\Field\LimitboxField',
			'JFormFieldLastvisitDateRange'      => 'use Joomla\CMS\Form\Field\LastvisitdaterangeField',
			'JFormFieldHelpsite'                => 'use Joomla\CMS\Form\Field\HelpsiteField',
			'JFormFieldHeadertag'               => 'use Joomla\CMS\Form\Field\HeadertagField',
			'JFormFieldFrontend_Language'       => 'use Joomla\CMS\Form\Field\FrontendlanguageField',
			'JFormFieldEditor'                  => 'use Joomla\CMS\Form\Field\EditorField',
			'JFormFieldContenttype'             => 'use Joomla\CMS\Form\Field\ContenttypeField',
			'JFormFieldContentlanguage'         => 'use Joomla\CMS\Form\Field\ContentlanguageField',
			'JFormFieldContenthistory'          => 'use Joomla\CMS\Form\Field\ContenthistoryField',
			'JFormFieldChromeStyle'             => 'use Joomla\CMS\Form\Field\ChromestyleField',
			'JFormFieldCaptcha'                 => 'use Joomla\CMS\Form\Field\CaptchaField',
			'JFormFieldAuthor'                  => 'use Joomla\CMS\Form\Field\AuthorField',
			'JFormField'                        => 'use Joomla\CMS\Form\FormField',
			'JForm'                             => 'use Joomla\CMS\Form\Form',
			'JFolder'                           => 'use Joomla\CMS\Filesystem\Folder',
			'JFilterWrapperOutput'              => 'use Joomla\CMS\Filter\Wrapper\OutputFilterWrapper',
			'JFilterOutput'                     => 'use Joomla\CMS\Filter\OutputFilter',
			'JFilterInput'                      => 'use Joomla\CMS\Filter\InputFilter',
			'JFilesystemWrapperPath'            => 'use Joomla\CMS\Filesystem\Wrapper\PathWrapper',
			'JFilesystemWrapperFolder'          => 'use Joomla\CMS\Filesystem\Wrapper\FolderWrapper',
			'JFilesystemWrapperFile'            => 'use Joomla\CMS\Filesystem\Wrapper\FileWrapper',
			'JFilesystemPatcher'                => 'use Joomla\CMS\Filesystem\Patcher',
			'JFilesystemHelper'                 => 'use Joomla\CMS\Filesystem\FilesystemHelper',
			'JFile'                             => 'use Joomla\CMS\Filesystem\File',
			'JFeedPerson'                       => 'use Joomla\CMS\Feed\FeedPerson',
			'JFeedParserRssMedia'               => 'use Joomla\CMS\Feed\Parser\Rss\MediaRssParser',
			'JFeedParserRssItunes'              => 'use Joomla\CMS\Feed\Parser\Rss\ItunesRssParser',
			'JFeedParserRss'                    => 'use Joomla\CMS\Feed\Parser\RssParser',
			'JFeedParserNamespace'              => 'use Joomla\CMS\Feed\Parser\NamespaceParserInterface',
			'JFeedParserAtom'                   => 'use Joomla\CMS\Feed\Parser\AtomParser',
			'JFeedParser'                       => 'use Joomla\CMS\Feed\FeedParser',
			'JFeedLink'                         => 'use Joomla\CMS\Feed\FeedLink',
			'JFeedItem'                         => 'use Joomla\CMS\Document\Feed\FeedItem',
			'JFeedImage'                        => 'use Joomla\CMS\Document\Feed\FeedImage',
			'JFeedFactory'                      => 'use Joomla\CMS\Feed\FeedFactory',
			'JFeedEntry'                        => 'use Joomla\CMS\Feed\FeedEntry',
			'JFeedEnclosure'                    => 'use Joomla\CMS\Document\Feed\FeedEnclosure',
			'JFeed'                             => 'use Joomla\CMS\Feed\Feed',
			'JFactory'                          => 'use Joomla\CMS\Factory',
			'JExtensionHelper'                  => 'use Joomla\CMS\Extension\ExtensionHelper',
			'JExtension'                        => 'use Joomla\CMS\Installer\InstallerExtension',
			'JErrorPage'                        => 'use Joomla\CMS\Exception\ExceptionHandler',
			'JEditor'                           => 'use Joomla\CMS\Editor\Editor',
			'JDocumentXml'                      => 'use Joomla\CMS\Document\XmlDocument',
			'JDocumentRendererRSS'              => 'use Joomla\CMS\Document\Renderer\Feed\RssRenderer',
			'JDocumentRendererModules'          => 'use Joomla\CMS\Document\Renderer\Html\ModulesRenderer',
			'JDocumentRendererModule'           => 'use Joomla\CMS\Document\Renderer\Html\ModuleRenderer',
			'JDocumentRendererMessage'          => 'use Joomla\CMS\Document\Renderer\Html\MessageRenderer',
			'JDocumentRendererHtmlModules'      => 'use Joomla\CMS\Document\Renderer\Html\ModulesRenderer',
			'JDocumentRendererHtmlModule'       => 'use Joomla\CMS\Document\Renderer\Html\ModuleRenderer',
			'JDocumentRendererHtmlMessage'      => 'use Joomla\CMS\Document\Renderer\Html\MessageRenderer',
			'JDocumentRendererHtmlHead'         => 'use Joomla\CMS\Document\Renderer\Html\HeadRenderer',
			'JDocumentRendererHtmlComponent'    => 'use Joomla\CMS\Document\Renderer\Html\ComponentRenderer',
			'JDocumentRendererHead'             => 'use Joomla\CMS\Document\Renderer\Html\HeadRenderer',
			'JDocumentRendererFeedRss'          => 'use Joomla\CMS\Document\Renderer\Feed\RssRenderer',
			'JDocumentRendererFeedAtom'         => 'use Joomla\CMS\Document\Renderer\Feed\AtomRenderer',
			'JDocumentRendererComponent'        => 'use Joomla\CMS\Document\Renderer\Html\ComponentRenderer',
			'JDocumentRendererAtom'             => 'use Joomla\CMS\Document\Renderer\Feed\AtomRenderer',
			'JDocumentRenderer'                 => 'use Joomla\CMS\Document\DocumentRenderer',
			'JDocumentRaw'                      => 'use Joomla\CMS\Document\RawDocument',
			'JDocumentOpensearch'               => 'use Joomla\CMS\Document\OpensearchDocument',
			'JDocumentJson'                     => 'use Joomla\CMS\Document\JsonDocument',
			'JDocumentImage'                    => 'use Joomla\CMS\Document\ImageDocument',
			'JDocumentHtml'                     => 'use Joomla\CMS\Document\HtmlDocument',
			'JDocumentFeed'                     => 'use Joomla\CMS\Document\FeedDocument',
			'JDocumentError'                    => 'use Joomla\CMS\Document\ErrorDocument',
			'JDocument'                         => 'use Joomla\CMS\Document\Document',
			'JDate'                             => 'use Joomla\CMS\Date\Date',
			'JDataSet'                          => 'use Joomla\Data\DataSet',
			'JDataDumpable'                     => 'use Joomla\Data\DumpableInterface',
			'JData'                             => 'use Joomla\Data\DataObject',
			'JDaemon'                           => 'use Joomla\CMS\Application\DaemonApplication',
			'JCryptPasswordSimple'              => 'use Joomla\CMS\Crypt\Password\SimpleCryptPassword',
			'JCryptPassword'                    => 'use Joomla\CMS\Crypt\CryptPassword',
			'JCryptKey'                         => 'use Joomla\CMS\Crypt\Key',
			'JCryptCipherSodium'                => 'use Joomla\CMS\Crypt\Cipher\SodiumCipher',
			'JCryptCipherSimple'                => 'use Joomla\CMS\Crypt\Cipher\SimpleCipher',
			'JCryptCipherRijndael256'           => 'use Joomla\CMS\Crypt\Cipher\Rijndael256Cipher',
			'JCryptCipherMcrypt'                => 'use Joomla\CMS\Crypt\Cipher\McryptCipher',
			'JCryptCipherCrypto'                => 'use Joomla\CMS\Crypt\Cipher\CryptoCipher',
			'JCryptCipherBlowfish'              => 'use Joomla\CMS\Crypt\Cipher\BlowfishCipher',
			'JCryptCipher3Des'                  => 'use Joomla\CMS\Crypt\Cipher\TripleDesCipher',
			'JCryptCipher'                      => 'use Joomla\CMS\Crypt\CipherInterface',
			'JCrypt'                            => 'use Joomla\CMS\Crypt\Crypt',
			'JControllerLegacy'                 => 'use Joomla\CMS\MVC\Controller\BaseController',
			'JControllerForm'                   => 'use Joomla\CMS\MVC\Controller\FormController',
			'JControllerAdmin'                  => 'use Joomla\CMS\MVC\Controller\AdminController',
			'JComponentRouterViewconfiguration' => 'use Joomla\CMS\Component\Router\RouterViewConfiguration',
			'JComponentRouterView'              => 'use Joomla\CMS\Component\Router\RouterView',
			'JComponentRouterRulesStandard'     => 'use Joomla\CMS\Component\Router\Rules\StandardRules',
			'JComponentRouterRulesNomenu'       => 'use Joomla\CMS\Component\Router\Rules\NomenuRules',
			'JComponentRouterRulesMenu'         => 'use Joomla\CMS\Component\Router\Rules\MenuRules',
			'JComponentRouterRulesInterface'    => 'use Joomla\CMS\Component\Router\Rules\RulesInterface',
			'JComponentRouterLegacy'            => 'use Joomla\CMS\Component\Router\RouterLegacy',
			'JComponentRouterInterface'         => 'use Joomla\CMS\Component\Router\RouterInterface',
			'JComponentRouterBase'              => 'use Joomla\CMS\Component\Router\RouterBase',
			'JComponentRecord'                  => 'use Joomla\CMS\Component\ComponentRecord',
			'JComponentHelper'                  => 'use Joomla\CMS\Component\ComponentHelper',
			'JComponentExceptionMissing'        => 'use Joomla\CMS\Component\Exception\MissingComponentException',
			'JClientWrapperHelper'              => 'use Joomla\CMS\Client\ClientWrapper',
			'JClientLdap'                       => 'use Joomla\Ldap\LdapClient',
			'JClientHelper'                     => 'use Joomla\CMS\Client\ClientHelper',
			'JClientFtp'                        => 'use Joomla\CMS\Client\FtpClient',
			'JCli'                              => 'use Joomla\CMS\Application\CliApplication',
			'JCategoryNode'                     => 'use Joomla\CMS\Categories\CategoryNode',
			'JCategories'                       => 'use Joomla\CMS\Categories\Categories',
			'JCaptcha'                          => 'use Joomla\CMS\Captcha\Captcha',
			'JCacheStorageXcache'               => 'use Joomla\CMS\Cache\Storage\XcacheStorage',
			'JCacheStorageWincache'             => 'use Joomla\CMS\Cache\Storage\WincacheStorage',
			'JCacheStorageRedis'                => 'use Joomla\CMS\Cache\Storage\RedisStorage',
			'JCacheStorageMemcached'            => 'use Joomla\CMS\Cache\Storage\MemcachedStorage',
			'JCacheStorageMemcache'             => 'use Joomla\CMS\Cache\Storage\MemcacheStorage',
			'JCacheStorageHelper'               => 'use Joomla\CMS\Cache\Storage\CacheStorageHelper',
			'JCacheStorageFile'                 => 'use Joomla\CMS\Cache\Storage\FileStorage',
			'JCacheStorageCachelite'            => 'use Joomla\CMS\Cache\Storage\CacheliteStorage',
			'JCacheStorageApcu'                 => 'use Joomla\CMS\Cache\Storage\ApcuStorage',
			'JCacheStorageApc'                  => 'use Joomla\CMS\Cache\Storage\ApcStorage',
			'JCacheStorage'                     => 'use Joomla\CMS\Cache\CacheStorage',
			'JCacheExceptionUnsupported'        => 'use Joomla\CMS\Cache\Exception\UnsupportedCacheException',
			'JCacheExceptionConnecting'         => 'use Joomla\CMS\Cache\Exception\CacheConnectingException',
			'JCacheException'                   => 'use Joomla\CMS\Cache\Exception\CacheExceptionInterface',
			'JCacheControllerView'              => 'use Joomla\CMS\Cache\Controller\ViewController',
			'JCacheControllerPage'              => 'use Joomla\CMS\Cache\Controller\PageController',
			'JCacheControllerOutput'            => 'use Joomla\CMS\Cache\Controller\OutputController',
			'JCacheControllerCallback'          => 'use Joomla\CMS\Cache\Controller\CallbackController',
			'JCacheController'                  => 'use Joomla\CMS\Cache\CacheController',
			'JCache'                            => 'use Joomla\CMS\Cache\Cache',
			'JButton'                           => 'use Joomla\CMS\Toolbar\ToolbarButton',
			'JBuffer'                           => 'use Joomla\CMS\Utility\BufferStreamHandler',
			'JBrowser'                          => 'use Joomla\CMS\Environment\Browser',
			'JAuthenticationResponse'           => 'use Joomla\CMS\Authentication\AuthenticationResponse',
			'JAuthenticationHelper'             => 'use Joomla\CMS\Helper\AuthenticationHelper',
			'JAuthentication'                   => 'use Joomla\CMS\Authentication\Authentication',
			'JAssociationExtensionInterface'    => 'use Joomla\CMS\Association\AssociationExtensionInterface',
			'JAssociationExtensionHelper'       => 'use Joomla\CMS\Association\AssociationExtensionHelper',
			'JApplicationWebClient'             => 'use Joomla\Application\Web\WebClient',
			'JApplicationWeb'                   => 'use Joomla\CMS\Application\WebApplication',
			'JApplicationSite'                  => 'use Joomla\CMS\Application\SiteApplication',
			'JApplicationHelper'                => 'use Joomla\CMS\Application\ApplicationHelper',
			'JApplicationDaemon'                => 'use Joomla\CMS\Application\DaemonApplication',
			'JApplicationCms'                   => 'use Joomla\CMS\Application\CMSApplication',
			'JApplicationCli'                   => 'use Joomla\CMS\Application\CliApplication',
			'JApplicationBase'                  => 'use Joomla\CMS\Application\BaseApplication',
			'JApplicationAdministrator'         => 'use Joomla\CMS\Application\AdministratorApplication',
			'JAccessWrapperAccess'              => 'use Joomla\CMS\Access\Wrapper\Access',
			'JAccessRules'                      => 'use Joomla\CMS\Access\Rules',
			'JAccessRule'                       => 'use Joomla\CMS\Access\Rule',
			'JAccessExceptionNotallowed'        => 'use Joomla\CMS\Access\Exception\NotAllowed',
			'JAccess'                           => 'use Joomla\CMS\Access\Access',
		);
	}

	/**
	 * Process files
	 *
	 * @return void
	 */
	public function migrate()
	{
		// Updates the class names in the php files.
		$directory = new \RecursiveDirectoryIterator($this->sourceDir);
		$iterator  = new \RecursiveIteratorIterator($directory, \RecursiveIteratorIterator::SELF_FIRST);

		foreach ($iterator as $file)
		{
			if ($file->isFile())
			{
				// Get file extension, name
				$fileExtension = $file->getExtension();
				$fileName      = $file->getFilename();
				$filePath      = $file->getPathname();

				// Add or update missing core joomla namespaces in php files
				if ($fileExtension == 'php')
				{
					// Green, yellow
					echo "\033[0;32m \n\n>>>> Adding / Updating core Joomla namespaces in file:";
					echo "\033[0;33m\n" . $filePath;
					$this->updateNamespaces($filePath);

					$this->processedCount++;
				}
			}
		}
	}

	/**
	 * Add or update missing namespaces
	 *
	 * @param   string  $filePath  File path
	 *
	 * @return  void
	 */
	public function updateNamespaces($filePath)
	{
		$usedNamespaces = array();

		// Variable to store the line number from where the code begins
		$codeStartLineNumber  = 0;
		$this->nameSpacesUsedInFile = array();

		$file        = fopen($filePath, 'r');
		$fileContent = array();
		$lineCount   = 0;

		// Loop through the file
		while (!feof($file))
		{
			$lineCount++;
			$line = fgets($file);
			$updatedLine = '';

			if (strpos($line, '_JEXEC') !== false)
			{
				$codeStartLineNumber = $lineCount;
			}

			// @defined('JPATH_BASE') or die;
			if (strpos($line, "defined('JPATH_BASE')") !== false
				|| strpos($line, 'defined("JPATH_BASE")') !== false)
			{
				$codeStartLineNumber = $lineCount;
			}

			foreach ($this->nameSpaces as $oldClassName => $nameSpace)
			{
				$position                        = strpos($line, $oldClassName);
				$singleLineCommentPosition       = strpos($line, '//');
				$multiLinePosition               = strpos($line, '*');
				$scopeResolutionOperatorPosition = strpos($line, '::');

				// Find old class name used in this line
				// Ignore lines starting with // or *
				if ($position !== false && $singleLineCommentPosition === false && $multiLinePosition === false)
				{
					$mappedNamespace = $this->nameSpaces[$oldClassName];
					$tmp = explode("\\", $mappedNamespace);
					$end = end($tmp);

					// Ensure - no false positives are replaced
					// Eg: JHtmlSidebar:: => HTMLHelperSidebar:: shall be avoided
					$tempOldClassName = $oldClassName;

					if ($scopeResolutionOperatorPosition !== false)
					{
						$tempOldClassName = $oldClassName . '::';
					}

					/*if (
						!preg_match("/^[a-zA-Z]$/", substr($line, strpos($line, $tempOldClassName) - 1, 1))
						&&
						!preg_match("/^[a-zA-Z]$/", substr($line, strlen($tempOldClassName) + strpos($line, $oldClassName), 1))
					)*/
					if (strpos($line, $tempOldClassName))
					{
						$updatedLine = str_replace($oldClassName, $end, $line);
						$line = $updatedLine;

						$this->updatedLinesCount++;
					}

					if (!in_array($this->nameSpaces[$oldClassName], $usedNamespaces))
					{
						$usedNamespaces[$end] = $this->nameSpaces[$oldClassName];
						array_splice($fileContent, $codeStartLineNumber, 0, $this->nameSpaces[$oldClassName] . ';' . "\n");
						$codeStartLineNumber++;
					}
				}
			}

			$fileContent[] = $line;
		}

		fclose($file);

		$file = fopen($filePath, 'w');
		file_put_contents($filePath, implode("", $fileContent));
		fclose($file);

		// Updates the class names in the php files.
		$file = fopen($filePath, 'r');
		$fileContent = array();
		$usedNamespaces = array();

		// Loop through the file
		while (!feof($file))
		{
			$line = fgets($file);
			$nameSpaceExists = true;

			foreach ($this->nameSpaces as $oldClassName => $nameSpace)
			{
				$position = strpos($line, str_replace('use ', '', $nameSpace));

				if ($position !== false)
				{
					if (in_array($nameSpace, $usedNamespaces))
					{
						$nameSpaceExists = false;
						break;
					}
					else
					{
						// @echo "\033[0;33m\n" . $nameSpace;
						$usedNamespaces[] = $nameSpace;
					}
				}
			}

			if ($nameSpaceExists === true)
			{
				$fileContent[] = $line;
			}
		}

		if (!empty($usedNamespaces))
		{
			// Green, yello
			echo "\033[0;32m \n>> Namespaces Added/Updated:";

			foreach ($usedNamespaces as $nameSpace)
			{
				echo "\033[0;33m\n" . $nameSpace;
			}
		}

		fclose($file);

		$file = fopen($filePath, 'w');
		file_put_contents($filePath, implode("", $fileContent));
		fclose($file);
	}
}

if (!is_dir($argv[1]))
{
	echo "\033[0;31m Provide valid source directory\n\033[0;32m Usage: \n php namespaces.php /path/to/valid/source/directory\n";
}
else
{
	// Saves the start time and memory usage.
	$startTime = microtime(1);
	$startMem  = memory_get_usage();

	$J3Namespaces = new J3Namespaces($argv[1]);
	$J3Namespaces->migrate();

	// Saves the start time and memory usage.
	$endTime = microtime(1);
	$endMem  = memory_get_usage();

	$timeTaken = (float) $endTime - (float) $startTime;

	echo "\n\n\033[1;33m------------------------------------------------";
	echo "\n\033[0;33m***Summary***";
	echo "\n\033[0;33mCompleted adding/updating namespaces";
	echo "\n\033[0;33mProcessed  " . $J3Namespaces->processedCount . " files";
	echo "\n\033[0;33mUpdated    " . $J3Namespaces->updatedLinesCount . " lines";
	echo "\n\033[0;33mTime taken " . round($timeTaken, 2) . " seconds";
	echo "\n\033[1;33m------------------------------------------------";
	echo "\n\033[1;37m \n";
}
