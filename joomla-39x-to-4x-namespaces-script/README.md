# joomla-namespaces-script

### Intro
This script helps you add/update namespaces added since Joomla 3.8.x onwards in your existing code.

For example, your Joomla code which is not using updated namespaces is changed from

```php
<img src="<?php echo JUri::root(true) . '/modules/mod_jbolotheme/tmpl/facebook.png'; ?>" />
```

to
```php
<img src="<?php echo Uri::root(true) . '/modules/mod_jbolotheme/tmpl/facebook.png'; ?>" />
```

Also, in the same file, the namespace being used is added at the top after line containing `defined('_JEXEC')` eg:

```php
// No direct access.
defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Uri\Uri;
```

### Dragons ahead!
- Take backup of your source code first
- Be careful to pass a test/copy folder as source, as changes are made directly in files located at path you pass
- Do compare original and modified files using tool like meld or similar one before you commit/use changes 

### Sample Usage
- Clone this repo 
- Run command as below by passing correct path for namespaces.php, your source code

```sh
php namespaces.php '/home/manoj/git/jbolo/src'
```

### Sample Output

```sh
>>>> Adding / Updating core Joomla namespaces in file:
~/src/modules/site/mod_jbolotheme/mod_jbolotheme.php 
>> Namespaces Added/Updated:
use Joomla\CMS\Filesystem\Path
use Joomla\CMS\Factory
use Joomla\CMS\Language\Text
use Joomla\CMS\Filesystem\File
use Joomla\CMS\Component\ComponentHelper
use Joomla\CMS\Helper\ModuleHelper
use Joomla\CMS\Plugin\PluginHelper 

>>>> Adding / Updating core Joomla namespaces in file:
~/src/modules/site/mod_jbolotheme/tmpl/default.php 
>> Namespaces Added/Updated:
use Joomla\CMS\Uri\Uri

------------------------------------------------
***Summary***
Completed adding/updating namespaces
Processed  76 files
Updated    883 lines
Time taken 9.15 seconds
------------------------------------------------
```
