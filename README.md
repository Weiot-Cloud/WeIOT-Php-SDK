# WeIOT PHP SDK



# Requirements

PHP 7.4 and later.

# Installation

### Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require weiot/phpsdk:dev-main
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

```php
require_once('vendor/autoload.php');
```

# Usage

```php
// On Framework

use WeIOT\PhpSdk\Provider\Developer\DeveloperManager;
use WeIOT\PhpSdk\Provider\App\AppManager;
use WeIOT\PhpSdk\Provider\Company\CompanyManager;
use WeIOT\PhpSdk\Provider\Customer\Customer;
use WeIOT\PhpSdk\Provider\Customer\Authentication;
```

```php
  // SDK Config Manager
  $Config         = new WeIOT\PhpSdk\Config();
  
  
  $Config->setAppID("[Developer App ID]");
  $Config->setDevID("[Developer ID]");
  $Config->setDevToken("[Developer Token]");
  $Config->setDevKey("[Developer Key]");

    // Developer Login If Success Return Auth Token Code for Management
    $developerLogin                     =
        DeveloperManager::login(
            $Config
        );

    // Ger Developer App Profile
    $getAppProfile                    =
        AppManager::profile(
            $Config,
            $developerLogin
        );
```

```php
  // Company 
 
   // Company App Purchase Checking
    $getAppSalesCheck       =
        AppManager::salesChecking(
            $Config,
            $developerLogin,
            $TestAuthToken
        );

    // Company Access All Customers
    $getCustomerRecords    =
        Customer::records(
            $Config,
            $developerLogin,
            $TestAuthToken
        );


    // Company Customer Profile
    $getCustomerDetails             =
        Customer::profile(
            $Config,
            $developerLogin,
            $TestAuthToken,
            4
        );


    // Company short Config Profile
    $getCompanyShortConfigDetails     =
        CompanyManager::short(
            $Config,
            $developerLogin,
            $TestAuthToken,
            "[Short Prefix]"
        );


    // Company Offices
    $getCompanyOffices     =
        CompanyManager::offices(
            $Config,
            $developerLogin,
            $TestAuthToken
        );


    // Company Employers
    $getCompanyEmployers     =
        CompanyManager::employers(
            $Config,
            $developerLogin,
            $TestAuthToken
        );


    // Employer Reminders
    $getReminders     =
        CompanyManager::reminders(
            $Config,
            $developerLogin,
            $TestAuthToken
        );

    // Employer Reminder Profile
    $getReminderDetails     =
        CompanyManager::reminder(
            $Config,
            $developerLogin,
            $TestAuthToken,
            "[Reminder ID]"
        );


```


```php
  // Customer 
 
 

    // Customer Reminders
    $getCustomerReminders     =
        Customer::reminders(
            $Config,
            $developerLogin,
            $TestAuthToken,
            "[Customer ID]"
        );

    // Customer Reminder Profile
    $getCustomerReminder     =
        Customer::reminder(
            $Config,
            $developerLogin,
            $TestAuthToken,
            "[Reminder ID]"
        );


```



```php
  // Customer  Auth
 
 

  
    // Customer Auth Login
    $getCustomerLogin     =
        Authentication::login(
            $Config,
            $developerLogin,
            "[Customer Personal Email]",
            "[Customer Password]"
        );


    // Customer Auth Reset
    $getCustomerReset     =
        Authentication::reset(
            $Config,
            $developerLogin,
            "[Customer Personal Email]"
        );


    // Customer Auth Profile
    $getCustomerProfile     =
        Authentication::profile(
            $Config,
            $getCustomerLogin
        );


    // Customer Auth Folders
    $getCustomerFolders     =
        Authentication::folders(
            $Config,
            $getCustomerLogin
        );



```

See other samples under samples directory.

## Development

Install dependencies:

``` bash
composer install
```
