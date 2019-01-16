Recruitment Task

Installation
- composer require softwaretarget/task
- bin/magento setup:upgrade
- bin/magento cache:flush
- clear static files andd js/css cache

features:
- add field to checkout 'external_order_id'
- field is visible in order details - frontend
- field is visible in order details - adminhtml
- field is visible in 'My Orders' - frontend
- field is visible in Orders - adminhtml (grid)
- field is validate by server side and js
