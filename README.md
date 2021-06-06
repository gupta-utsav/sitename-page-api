# custom-Drupal8-Module 

## Background Information

When logged in as the administrator, the "Site Information" form can be found at the path `/admin/config/system/site-information`.

## Requirements

This module needs to alter the existing Drupal "Site Information" form. Specifics:

  - [x] A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
  - [x] When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
  - [x] A Drupal message should inform the user that the Site API Key has been saved with that value.
  - [x] When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
  - [x] The text of the "Save configuration" button should change to "Update Configuration".
  - [x] This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with **"access denied"**.

## Example URL

```http://localhost/page_json/FOOBAR12345/17```

### Spent Time

Overall time for coding and testing ~ 3.5 Hours

### Referances

[Form Alter](https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Form%21form.api.php/function/hook_form_FORM_ID_alter/8.8.x)
[Editing & Setting value for variable object](https://www.drupal.org/docs/upgrading-and-converting-drupal-7-modules/step-4-convert-drupal-7-variables-to-drupal-8)
[JSON Response]https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.6.x
