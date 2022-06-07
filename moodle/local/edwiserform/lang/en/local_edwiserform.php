<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * English language
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

$prolabel = '<label class="efb-forms-pro-label m-0">PRO</label>';
$string['pluginname'] = "Edwiser Forms Free";
$string['heading-newform'] = "Add New Form";
$string['heading-editform'] = "Edit Form";
$string['heading-listforms'] = "View All Forms";
$string['heading-listforms-empty'] = "You don't have any form. Click on Add New Form to create one.";
$string['listformdata-empty'] = "There are no submissions yet.";
$string["heading-listforms-showing"] = 'Showing {$a->start} to {$a->end} of {$a->total} entries';
$string["heading-viewdata"] = "View data";
$string['heading-import'] = 'Import form(PRO)';
$string['settings'] = "Settings";
$string['header-settings'] = "Form Settings";
$string['genral-settings'] = "General Settings";
$string['enable-user-level-from-creation'] = "Allow teacher to create new form";
$string['des-enable-user-level-from-creation'] = "This will allow teacher to add the new form and view form submitted data.";
$string['google-recaptcha-sitekey'] = 'Google reCaptcha site key';
$string['desc-google-recaptcha-sitekey'] = 'Enter google reCaptcha sitekey to use reCaptcha in your form';
$string['enable-site-navigation'] = 'Enable navigation using sidebar';
$string['desc-enable-site-navigation'] = 'Enable this to add navigation links in sidebar.';
$string['invalid-page'] = "Invalid";
$string['btn-next'] = "Next";
$string['btn-previous'] = "Previous";
$string['btn-save'] = "Save Changes";
$string['lbl-form-setup'] = "Templates";
$string['lbl-form-settings'] = "Settings";
$string['lbl-form-builder'] = "Fields";
$string['lbl-form-preview'] = "Preview";
$string['form-builder-step'] = 'Build Form';
$string['lbl-title'] = "Title";
$string["lbl-title-warning"] = "Title cannot be empty.";
$string["lbl-courses-warning"] = "Please select at least 1 course.";
$string["lbl-empty-form-warning"] = "Please add fields in form.";
$string['lbl-description'] = "Description";
$string['lbl-description-warning'] = "Description cannot be empty.";
$string['lbl-allowedit'] = "Allow Data Edit";
$string['lbl-allowedit-desc'] = "Allow user to edit submitted data.";
$string['lbl-event'] = "Select Event";
$string['lbl-event-choose'] = "Choose events";
$string['lbl-event-search'] = "Search events";
$string['lbl-event-search-not-found'] = "No results";
$string['lbl-event'] = "Select Event";
$string['lbl-courses-list'] = "Select Courses";
$string['lbl-notifi-email'] = "Recipient Email Address";
$string['lbl-notifi-email-warning'] = "Invalid email address.";
$string['lbl-notifi-email-duplicate'] = "Email is already present in the list.";
$string['lbl-multiplesubmission'] = 'Note: Selected template supports multiple submission';
$string['cannot-create-form'] = "You are not allowed to create form.";
$string['forms-get-title-desc'] = 'Please enter title and description';
$string['forms-update-confirm'] = "Do you want to create new form or overwrite existing?";
$string['forms-update-create-new'] = "New";
$string['forms-update-overwrite-existing'] = "Overwrite";
$string['admin-disabled-teacher'] = "You are not allowed to create form. Contact Admin to enable form creation.";
$string['contact-admin'] = "Please contact Site Admin.";
$string['notify-email-subject'] = '{$a->site}: New user submission in {$a->title}.';
$string['notify-email-body'] = '{$a->user} has made submission in {$a->title} form. To see all submissions please <a href="{$a->link}">click</a> here.';
$string['notify-email-failed'] = "<p>Unable to send email.</p>";
$string['notify-email-success'] = "<p>Notified successfully.</p>";
$string['confirmation-email-failed'] = "<p>Unable to send confirmation email.</p>";
$string['confirmation-email-success'] = "<p>Confirmation email sent successfully.</p>";
$string['notify-email-failed'] = "<p>Unable to notify author.</p>";

$string['delete-form-and-data'] = '{$a->title} form with ID({$a->id}) will be deleted along with its submissions. Are you sure you want to delete this form?';
$string['deletesubmission'] = 'Delete submission?';
$string['deletesubmissionmsg'] = 'Are you sure you want to delete selected submission?';
$string['submissionsdeleted'] = 'Submissions deleted successfully.';
$string['submissiondeleted'] = 'Submission deleted successfully.';
$string['emptysubmission'] = 'Please select submission to delete';
$string['note'] = 'Note:';
$string['clickonshortcode'] = 'Click on shortcode to copy';
$string['shortcodecoppied'] = '{$a} copied to clipboard';
$string['hey-wait'] = 'Hey Wait';
$string['search-form'] = 'Search Forms:';
$string['search-entry'] = 'Search Entry:';
$string['missing-name-attribute-field'] = 'Please provide name in the: <strong>{$a}</strong>. This is important to run form properly.';
$string['form-style'] = 'Style';
$string['form-enter-title'] = 'Please give a name to your form';
$string['fullpage-link-message'] = '<a class="efb-view-fullpage" href="#">Click here</a> to view form in new tab.';
$string['fullpage-link-clicked'] = 'Form is opened in another tab.';

 // Template event string.
$string['event-blank-name'] = "Blank Form";
$string['event-blank-desc'] = "The blank form allows you to create any type of form using our drag & drop builder.";
$string['event-hover-text'] = "Select this form";
$string['event-enrolment-name'] = 'Course Enrolment Form';
$string['event-enrolment-desc'] = 'Provides the form for the user enrollment.';
$string['event-login-name'] = 'User Login Form';
$string['event-login-desc'] = 'Provides the login form. You can use this form in the place of default login form.';
$string['event-registration-name'] = "User Registration Form";
$string['event-registration-desc'] = "Provides the registration form. Use this form to create user account.";
$string['pro-label'] = 'PRO';
$string['preview-only'] = 'Preview Only';

// Setup template strings start.
$string['setup-msg-select-tmpl'] = "To speed up the process, you can select from one of our pre-made templates";
$string['lbl-form-setup-formname'] = "Form Name";
$string['lbl-form-setup-formname-placeholder'] = "Enter your form name here…";
$string['lbl-form-setup-formname-sub-heading'] = "Select a Template";
$string['setup-additional-title'] = "Additional Templates";
$string['setup-additional-desc'] = "txt1";
$string['setup-additional-title'] = "txt2";
$string['setup-btn-upgrade'] = "Upgrade";
$string['setup-need-more-template'] = "Need more templates";
$string['setup-more-templates-message'] = "More templates are available in Edwiser Form PRO version";
$string['setup-msg-upgrade'] = "Unlock Pre-Made templates";
$string['setup-msg-upgrade-desc'] = "Edwiser Forms Free allows you to create Contact, Feedback, Support forms but there are other forms which have events on form submission. You can use those forms by unlocking our other pre-made form templates.";
$string['form-editing'] = "Now editing";
$string['select-template-warning'] = 'Please select template before proceeding';
$string["template-not-found"] = "Template not found.";
$string["template-name-not-valid"] = "Template name is not valid";
$string["template-found"] = "Template found";
$string["operation-failed"] = "Operation failed";
$string["active"] = "SELECTED";
$string["enrol-success"] = 'Enrollment of user {$a} in courses is successful.';
$string["unenrol-success"] = 'Unenrollment of user {$a} in courses is successful.';
$string["enrol-success"] = 'Enrollment of user {$a} in courses is unsuccessful.';
$string["unenrol-success"] = 'Unenrollment of user {$a} in courses is unsuccessful.';
$string["attention"] = "Attention";
$string["template-change-warning"] = "All fields from current form will be deleted. Are you sure you want to continue?";

// Setup template strings end.


// Settings string start.
$string['settings-general'] = "General";
$string['settings-notification'] = "Notification";
$string['settings-confirmation'] = 'Confirmation ';
$string['settings-events'] = 'Events ' . $prolabel;
$string['allowsubmissionsfromdate'] = 'Start date ' . $prolabel;
$string['allowsubmissionstodate'] = 'End date ' . $prolabel;
$string['enable-notification'] = 'Enable notification ' . $prolabel;
$string['enable-notification-desc'] = 'Enable email notification.(Always enabled in Edwiser Forms Free)';
$string['notify-email-subject'] = 'New user submission';
$string['notify-email-subject-setting'] = 'Email Subject ' . $prolabel;
$string['notify-email-body'] = '<div style="background-color: #efefef; -webkit-text-size-adjust: none !important; margin: 0; padding: 70px 70px 70px 70px;"><table id="template_container" style="text-align: center; padding-bottom: 20px; background-color: rgb(223, 223, 223); box-shadow: rgba(0, 0, 0, 0.024) 0px 0px 0px 3px !important; border-radius: 6px !important; margin: auto;" border="0" width="500" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #1177d1;border-top-left-radius: 6px !important;border-top-right-radius: 6px !important;border-bottom: 0;font-family: Arial;font-weight: bold;line-height: 100%;vertical-align: middle;">
<h1 style="text-align: center;color: white;margin: 0px;padding: 28px 24px;display: block;font-family: Arial;font-size: 30px;font-weight: bold;">Edwiser Forms Free</h1>
</td>
</tr>
<tr>
<td style="padding: 20px; background-color: #dfdfdf; border-radius: 6px !important;" align="center" valign="top">
<div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Hi,</div><div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Someone has made submission in your form.</div>
<div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div>
<div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div></td></tr>
</tbody>
</table>
</div>';
$string['email-show-tags'] = 'Show tags';
$string['email-hide-tags'] = 'Hide tags';
$string['email-body-tags'] = [
    '{FORM_TITLE}' => 'Title of form',
    '{SITE_NAME}' => 'Will be replaced with site name',
    '{USER_FULLNAME}' => 'Firstname and Lastname of user',
    '{USER_FIRSTNAME}' => 'User\'s firstname',
    '{USER_LASTNAME}' => 'User\'s lastname',
    '{AUTHOR_NAME}' => 'Firstname and Lastname of author',
    '{AUTHOR_FIRSTNAME}' => 'Author\'s firstname',
    '{AUTHOR_LASTNAME}' => 'Author\'s lastname',
    '{USER_LINK}' => 'Link of user with fullname',
    '{ALL_FIELDS}' => 'All fields from form',
    '{VIEW_DATA_LINK LABEL=\"click\"}' => 'Link to view submission with custom label'
];
$string['notify-email-body-setting'] = 'Email Body ' . $prolabel;
$string['confirmation-email-failed'] = "<p>Unable to send confirmation email.</p>";
$string['confirmation-email-success'] = "<p>Confirmation email sent successfully.</p>";
$string['notify-email-failed'] = "<p>Unable to notify author.</p>";
$string['notify-email-success'] = "<p>Notified to author successfully.</p>";
$string["confirmation-subject"] = "Form Confirmation Email Subject"  . $prolabel;
$string["confirmation-default-subject"] = 'Form submitted successfully.';
$string["confirmation-msg"] = "Form Confirmation Email Message";
$string["confirmation-default-msg"] = '<div style="background-color: #efefef; -webkit-text-size-adjust: none !important; margin: 0; padding: 70px 70px 70px 70px;"><table id="template_container" style="text-align: center; padding-bottom: 20px; background-color: rgb(223, 223, 223); box-shadow: rgba(0, 0, 0, 0.024) 0px 0px 0px 3px !important; border-radius: 6px !important; margin: auto;" border="0" width="500" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #1177d1;border-top-left-radius: 6px !important;border-top-right-radius: 6px !important;border-bottom: 0;font-family: Arial;font-weight: bold;line-height: 100%;vertical-align: middle;">
<h1 style="text-align: center;color: white;margin: 0px;padding: 28px 24px;display: block;font-family: Arial;font-size: 30px;font-weight: bold;">Edwiser Forms Free</h1>
</td>
</tr>
<tr>
<td style="padding: 20px; background-color: #dfdfdf; border-radius: 6px !important;" align="center" valign="top">
<div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Hi,</div><div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Thank you for submission.</div><div style="font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div></td></tr></tbody></table><br>
</div>';
$string['error-occured-while-loading'] = 'Please wait while the page is loading. <br> If nothing appears then try to reload the page.';
$string['email-body-restore-desc'] = '<a href="#" class="efb-email-body-restore" data-id="{$a->id}" data-string="{$a->string}">Restore</a> email body to default.';
$string['recipient-email-desc'] = 'Default: Author\'s email address';
// Settings strings end.

$string["tbl-heading-title"] = "Title";
$string["tbl-heading-type"] = "Type";
$string["tbl-heading-shortcode"] = "Shortcode";
$string["tbl-heading-author"] = "Author";
$string["tbl-heading-author2"] = "Updated By";
$string["tbl-heading-created"] = "Created On";
$string["tbl-heading-submitted"] = "Submitted On";
$string['suspend'] = 'Suspend';
$string["tbl-heading-modified"] = "Last Updated";
$string["tbl-heading-versions"] = "Versions";
$string["tbl-heading-version"] = "Version";
$string["tbl-heading-action"] = "Manage";
$string["form-action-edit-title"] = "Edit form";
$string["form-action-delete-title"] = "Delete";
$string["form-action-view-data-title"] = "View data";
$string["form-action-preview-title"] = "Preview form";
$string["form-action-live-demo-title"] = "Live demo";
$string["form-action-enable-title"] = "Enable form";
$string["form-action-disable-title"] = "Disable form";
$string["form-action-enable-failed"] = "Form enable failed";
$string["form-action-disable-failed"] = "Form disable failed";
$string["form-action-enable-success"] = "Form enable success";
$string["form-action-disable-success"] = "Form disable success";
$string["form-setting-save-msg"] = "Form saved successfuly. You will redirected to forms list. Click Ok to redirect manually.";
$string["form-setting-saved"] = "Your form is already saved. You will redirected to forms list.";
$string["form-setting-save-fail-msg"] = "Error while saving form definition.";
$string["form-def-save-fail-msg"] = "Error while saving form definition.";
$string["form-def-update-fail-msg"] = 'Cannot overwrite form. User submissions present. Try to create new form or <a href="{$a}" target="_blank">upgrade</a> to pro to override form even if it have submissions.';
$string["form-setting-update-fail-msg"] = "Unable to update form.";
$string["form-setting-update-msg"] = "Form has been updated successfuly. Click Ok to redirect to forms list.";
$string["list-form-data-page-title"] = "List Form Data.";
$string["msg-form-delete-success"] = "Form deleted successfuly.";
$string["msg-form-delete-fail"] = "Form deletion failed.";
$string["valid-form-data"] = "Form data is valid";
$string["invalid-form-data"] = "Form data is not valid";
$string["login-form-disable-different-form"] = "Cannot disable. Another login form is active";
$string["exportcsv"] = "Export CSV(PRO)";
$string["exportxlsx"] = "Export Excelsheet(PRO)";
$string['apply'] = 'Apply';
$string['selectbulkaction'] = 'Please select action';

// Import export form.
$string["form-action-export-title"] = "Export form";
$string['form-import'] = 'Import form(PRO)';
$string['import-file'] = 'Select .xml file to import';
$string['import-file_help'] = 'Select .xml file to import form. This form will appear in list and can be used in future.';
$string['import-no-file'] = 'Please select file';
$string['import-empty-file'] = 'File do not contain anything';
$string['import-invalid-file-no-title'] = 'Form does not have title';
$string['import-invalid-file-no-description'] = 'Form does not have description';
$string['import-invalid-file-no-definition'] = 'Form does not have definition';
$string['import-invalid-file-no-type'] = 'Form does not have form type';
$string['import-invalid-file-no-courses'] = 'Form does not have courses';
/* End */

// Form viewer strings.
$string["form-not-found"] = 'Form {$a} not found.';
$string["form-not-enabled"] = 'Form {$a} not enable.';
$string["form-data-heading-action"] = "Action";
$string["form-data-heading-user"] = "User";
$string["form-data-submission-successful"] = '<p>Form submitted successfully. <a href="{$a}">Click</a> here to visit homepage.</p>';
$string["form-data-submission-failed"] = "Form data submission failed";
$string["form-data-submission-not-supported"] = "This form type does not support form submission";
$string["form-data-action-no-action"] = "No actions";
$string["form-data-no-data"] = "Found empty form definition. Nothing to display.";
$string["form-submission-found"] = 'You already submitted response. You are not allowed to edit or submit response. <a href="{$a}">Click</a> here to visit homepage.</p>';
$string["form-cannot-submit"] = "You are not allowed to submit data";
$string["unknown-error"] = "Unknown error";
$string["form-definition-found"] = "Form definition found";
$string["form-loggedin-required"] = 'You need to login before seeing the form. {$a} here to login.';
$string["form-loggedin-required-click"] = "Click";
$string["form-loggedin-not-allowed"] = "Form cannot be shown while you logged in";

/* JS Strings */
$string["action.add.attrs.attr"] = "What attribute would you like to add?";
$string['attribute-help'] = 'What is attribute? <a target="_blank" href="https://www.google.com/search?q=what+is+html+form+field+attributes&oq=what+is+html+form+field+attr">Click here for help.</a>';
$string["action.add.attrs.value"] = "Default Value";
$string["address"] = "Address";
$string["allFieldsRemoved"] = "All fields were removed.";
$string["allowSelect"] = "Allow Select";
$string["attribute"] = "Attribute";
$string["attributes"] = "Attributes";
$string["class"] = $string["attrs.class"] = $string["attrs.className"] = "Css Class";
$string["attrs.required"] = "Required";
$string["attrs.type"] = "Type";
$string["attrs.id"] = "Id";
$string["attrs.title"] = "Title";
$string['attrs.list'] = 'List';
$string["attrs.style"] = "Style";
$string["attrs.dir"] = "Direction";
$string["attrs.placeholder"] = "Placeholder";
$string["attrs.name"] = "Name";
$string["attrs.template"] = $string["placeholder.template"] = "Templates";
$string["attrs.value"] = "Value";
$string["attributenotpermitted"] = "Attribute {{attr}}: not permitted";
$string["addcondition"] = "+ Condition";
$string["advanceFields"] = "Advance Fields";
$string["autocomplete"] = "Autocomplete";
$string["button"] = "Button";
$string["cannotBeEmpty"] = "This field cannot be empty";
$string["checkbox"] = "Checkbox";
$string["checkboxes"] = "Checkboxes";
$string["checkboxGroup"] = "Checkbox Group";
$string["clearstep"] = "Clear";
$string["clearallsteps"] = "Clear steps";
$string["clearstoragemessage"] = "Local storage is full. Please clear it to proceed further.";
$string["clearstorageautomatic"] = "Clear Automatically";
$string["clearstoragemanually"] = "Clear Manually";
$string["clearform"] = "Clear form";
$string['condition-choose-source'] = "Choose source";
$string["confirmresetform"] = "Are you sure you want to reset form? All fileds will be removed and selected template's fields will be added. ";
$string["close"] = "Close";
$string["column"] = "Column";
$string["city"] = "City/Town";
$string["content"] = "Content";
$string["control"] = "Control";
$string["controlGroups.nextGroup"] = "Next Group";
$string["controlGroups.prevGroup"] = "Previous Group";
$string["copy"] = "Copy To Clipboard";
$string["customcssstyle"] = "Custom Css Style";
$string["cannotremove"] = 'Cannot remove {$a}. Contains template elements:<br>';
$string["columnlayout"] = "Define a column layout";
$string["columnwidths"] = "Define column widths";
$string["control-name"] = "Name - First Name & Last Name";
$string["custom"] = "Custom";
$string["conditions"] = "Conditions";
$string["country"] = "Country";
$string["cancel"] = "Cancel";
$string["danger"] = "Danger";
$string["dark"] = "Dark";
$string["datalist"] = "Datalist";
$string["dragndrop"] = '{$a} drag and drop';
$string["default"] = "Default";
$string["description"] = "Help Text";
$string["descriptionField"] = "Description";
$string["devMode"] = "Developer Mode";
$string["divider"] = "Divider";
$string["display-label"] = "Field label position";
$string["display-label-off"] = "No label";
$string["display-label-top"] = "Top";
$string["display-label-left"] = "Left";
$string["editing.row"] = "Editing Row";
$string['page-background-opacity'] = 'Page background opacity';
$string["editNames"] = "Edit Names";
$string["editorTitle"] = "Form Elements";
$string["editXML"] = "Edit XML";
$string["en-US"] = "English";
$string["email"] = "Email";
$string["field"] = "Field";
$string["form-width"] = "Width(%)";
$string["form-responsive"] = "Form responsive";
$string["form-padding"] = "Padding(px)";
$string["fieldNonEditable"] = "This field cannot be edited.";
$string["fieldRemoveWarning"] = "Are you sure you want to remove this field?";
$string["fileUpload"] = "File Upload";
$string["firstname"] = "Firstname";
$string["formUpdated"] = "Form Updated";
$string["FormTitle"] = "Form Title";
$string["Formnovalidate"] = "Form novalidate";
$string["getStarted"] = "Drag a field from the right to this area";
$string["group"] = "Group";
$string["grouped"] = "Grouped";
$string['recaptcha-error'] = 'Please verify that you are not a robot.';
$string["header"] = "Header";
$string["hidden"] = "Hidden Input";
$string["hide"] = "Edit";
$string["htmlElements"] = "HTML Elements";
$string["import-form-button"] = "Import";
$string["import-form-title"] = "Select json file to import form";
$string["info"] = "Info";
$string["input.date"] = "Date";
$string["info"] = $string["primary"] = "Information";
$string["input.text"] = "Text - Single Line Text";
$string["legendfieldset"] = "Legend for fieldset";
$string["label"] = "Label";
$string["labelCount"] = "{label} {count}";
$string["labelEmpty"] = "Field Label cannot be empty";
$string["lastname"] = "Lastname";
$string["later"] = "Later";
$string["layout"] = "Layout";
$string["limitRole"] = "Limit access to one or more of the following roles:";
$string["light"] = "Light";
$string["link"] = "Link";
$string["mandatory"] = "Mandatory";
$string["maxlength"] = "Max Length";
$string["meta.group"] = "Group";
$string["meta.icon"] = "Ico";
$string["meta.label"] = "Label";
$string["minOptionMessage"] = "This field requires a minimum of 2 options";
$string["mobile"] = "Mobile";
$string["nofields"] = "There are no fields to clear";
$string["name"] = "Name";
$string["number"] = "Number";
$string["no"] = "No";
$string["off"] = "Off";
$string["on"] = "On";
$string["ok"] = "Ok";
$string["option"] = "Option";
$string["optional"] = "optional";
$string["optionEmpty"] = "Option value required";
$string["optionLabel"] = "Option {count}";
$string["options"] = "Options";
$string["panelEditButtons.attrs"] = "+ Attribute";
$string["panelEditButtons.options"] = "+ Option";
$string["panelEditButtons.tabs"] = "+ Tab";
$string["panelLabels.attrs"] = "Attrs";
$string["panelLabels.config"] = "Config";
$string["panelLabels.meta"] = "Meta";
$string["panelLabels.options"] = "Options";
$string["paragraph"] = "Paragraph";
$string["preview"] = "Preview";
$string["primary"] = "Primary";
$string["placeholder"] = "Placeholder";
$string["placeholder.id"] = "Id";
$string["placeholder.className"] = $string["placeholder.class"] = "Space separated classes";
$string["placeholder.email"] = "Enter you email";
$string["placeholder.label"] = "Label";
$string["placeholder.list"] = 'List';
$string["placeholder.password"] = "Enter your password";
$string["placeholder.placeholder"] = "Placeholder";
$string["placeholder.text"] = "Enter some Text";
$string["placeholder.textarea"] = "Enter a lot of text";
$string["placeholder.required"] = "Required";
$string["placeholder.type"] = "Type";
$string["placeholder.name"] = "Name";
$string["placeholder.style"] = "ex:
background-color: white;
border-color: 1px solid black;";
$string["placeholder.required"] = "Required";
$string["placeholder.selected"] = "Selected";
$string["password"] = "Password";
$string["panelLabels.logics"] = "Logics";
$string["panelEditButtons.logics"] = "Logics";
$string["panelLabels.logics"] = "Logics";
$string["panelEditButtons.logics"] = "Logics";
$string["proceed"] = "Proceed";
$string["profeature"] = '<strong>{$a}</strong> is part of Edwiser Forms Pro version. Upgrade to Edwiser Forms Pro Now to avail this feature.';
$string["export-pro-message"] = "It helps you save time by replicating the same form on another Moodle site.";
$string["profeaturemessage"] = '<strong>{$a->type}</strong> is part of Edwiser Forms Pro version.{$a->message} Upgrade to Edwiser Forms Pro Now to avail this feature.';
$string["row.settings.inputGroup.aria"] = "Aria";
$string["radio"] = "Radio";
$string["radioGroup"] = "Radio Group - Radio Button";
$string["remove"] = "Remove";
$string["removeMessage"] = "Remove Element";
$string["required"] = "Required";
$string["reset"] = "Reset";
$string['restore-previous'] = 'Restore previous';
$string["reCaptcha"] = "ReCaptcha";
$string["richText"] = "Rich Text Editor";
$string["roles"] = "Access";
$string["row"] = "Row";
$string["row.makeInputGroup"] = "Make this row an input group.";
$string["row.makeInputGroupDesc"] = "Input Groups enable users to add sets of inputs at a time.";
$string["row.settings.fieldsetWrap"] = "Wrap row in a &lt;fieldset&gt; tag";
$string["row.settings.fieldsetWrap.aria"] = "Wrap Row in Fieldset";
$string["save"] = "Save";
$string["secondary"] = "Secondary";
$string["select"] = "Select - Dropdown";
$string["selectColor"] = "Select Color";
$string["selectionsMessage"] = "Allow Multiple Selections";
$string["selectOptions"] = "Options";
$string["separator"] = "Separator";
$string["settings"] = "Settings";
$string["size"] = "Size";
$string["sizes"] = "Sizes";
$string["sizes.lg"] = "Large";
$string["sizes.m"] = "Default";
$string["sizes.sm"] = "Small";
$string["sizes.xs"] = "Extra Small";
$string["standardFields"] = "Standard Fields";
$string["styles"] = "Styles";
$string["styles.btn"] = "Button Style";
$string["styles.btn.danger"] = "Danger";
$string["styles.btn.default"] = "Default";
$string["styles.btn.info"] = "Info";
$string["styles.btn.primary"] = "Primary";
$string["styles.btn.success"] = "Success";
$string["styles.btn.warning"] = "Warning";
$string["subtype"] = "Type";
$string["success"] = "Success";
$string["submit"] = "Submit";
$string["Tags"] = "Tags";
$string["tab"] = "Tabs";
$string["text"] = "Text Field";
$string["textarea"] = "Text Area - Paragraph Text";
$string["this"] = "This";
$string["toggle"] = "Toggle";
$string["ungrouped"] = "Un-Grouped";
$string["UntitledForm"] = "Untitled Form";
$string["upgrade"] = "Upgrade to PRO";
$string["username"] = "Username";
$string["value"] = $string["placeholder.value"] = "Value";
$string["viewXML"] = "</>";
$string["warning"] = "Warning";
$string["warning"] = "Warning";
$string["website"] = "Website";
$string["yes"] = "Yes";

// Tooltips for Form editor.
$string['row-move'] = 'Order row';
$string['row-edit'] = 'Edit row, column, conditional logic properties';
$string['row-clone'] = 'Duplicate row with its columns and fields';
$string['row-remove'] = 'Remove row along with columns and fields';

$string['column-remove'] = 'Remove column along with fields';
$string['column-clone'] = 'Duplicate column with all fields inside it';
$string['column-move'] = 'Move/Order column in any row';

$string['field-move'] = 'Move field in any row/column';
$string['field-edit'] = 'Edit field properties/options';
$string['field-clone'] = 'Duplicate field and its properties';
$string['field-remove'] = 'Remove field';

$string['delete-form'] = 'Delete everything';
$string['reset-form'] = 'Reset form to default';
$string['edit-form'] = 'Edit form settings';

$string['remove-attrs'] = 'Remove attribute';
$string['remove-options'] = 'Remove option';
$string['remove-configs'] = 'Remove config';
$string['remove-condition'] = 'Remove condition';
$string['order-option'] = 'Order option';

// Editing panel heading.
$string['select-options-label'] = 'Option Label';
$string['select-options-value'] = 'Option Value';
$string['input-radio-options-name'] = 'Radio Name';
$string['input-radio-options-label'] = 'Radio Label';
$string['input-radio-options-value'] = 'Radio Value';
$string['input-checkbox-options-name'] = 'Checkbox Name';
$string['input-checkbox-options-label'] = 'Checkbox Label';
$string['input-checkbox-options-value'] = 'Checkbox Value';
$string['input-radio-options-selected'] = $string['input-checkbox-options-selected'] = $string['select-options-selected'] = '';
$string['datalist-options-value'] = 'List option value';

// Validator Strings.
$string['input-invalid-type'] = 'Invalid input type in <strong>{$a}</strong>';
$string['select-option-invalid'] = 'Invalid option in <strong>{$a}</strong>.';
$string['input-radio-option-invalid'] = 'Invalid radio option in <strong>{$a}</strong>';
$string['input-checkbox-option-invalid'] = 'Invalid checkbox option in <strong>{$a}</strong>';
$string['input-all-option-invalid'] = $string['select-option-invalid'];

/* Tab configuration strings for designer */
$string["untitled"] = "Untitled";
$string["stepindex"] = "Step {{index}}";
$string["containersettings"] = "Container Settings";
$string["category-container-default"] = "Default steps";
$string["category-container-complete"] = "Completed steps";
$string["category-container-active"] = "Active step";
$string["category-container-danger"] = "Warning step";
$string['category-container-page'] = "Page settings";
$string["category-container-form"] = "Form settings";
$string["category-container-submit"] = "Submit button settings";
$string["backgroundcolor"] = 'Background color';
$string['bordercolor'] = 'Border color';
$string['textcolor'] = 'Text color';

/* Form designer form setting */
$string['submitbuttontext'] = 'Label';
$string['submitbuttonprocessingtext'] = 'Processing label';
$string['submitbuttonposition'] = 'Position';
$string['position-left'] = 'Left';
$string['position-center'] = 'Center';
$string['position-right'] = 'Right';
$string['backgroundcolor'] = 'Background color';
$string['textcolor'] = 'Label color';

/* Cron job string */
$string['delete-form-data-cron-start'] = 'Deleting form data of {$a}.';
$string['delete-form-data-cron-failed'] = 'Deleting form data of {$a} failed.';
$string['delete-form-data-cron-end'] = 'Deleted form data of {$a}.';
$string['delete-form-cron-start'] = 'Deleting form {$a}.';
$string['delete-form-cron-failed'] = 'Deleting form {$a} failed.';
$string['delete-form-cron-end'] = 'Deleted form {$a}.';

// Usage tracking.
$string['enableusagetracking'] = "Enable Usage Trakcing";
$string['enableusagetrackingdesc'] = "<strong>USAGE TRACKING NOTICE</strong>

<hr class='text-muted' />

<p>Edwiser from now on will collect anonymous data to generate product usage statistics.</p>

<p>This information will help us guide the development in right direction and the Edwiser community prosper.</p>

<p>Having said that we don't gather your personal data or of your students during this process. You can disable this from the plugin whenever you wish to opt out of this service.</p>

<p>An overview of the data collected is available <strong><a href='https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products' target='_blank'>here</a></strong>.</p>";
