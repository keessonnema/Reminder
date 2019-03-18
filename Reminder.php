<?php

/**
 * Class ReminderPlugin
 */
class ReminderPlugin extends MantisPlugin
{
    /**
     * Register the plugin
     */
    function register()
    {
        $this->name = 'Reminder';
        $this->description = lang_get('reminder_plugin_desc');
        $this->version = '2.1';
        $this->requires		= array(
            "MantisCore" => "2.3.0",
        );
        $this->author = 'Cas Nuy';
        $this->contact = 'Cas-at-nuy.info';
        $this->url = 'http://www.nuy.info';
        $this->page = 'config';
    }

    /**
     * Default plugin configuration.
     *
     * @return array
     */
    function config()
    {
        return array(
            'reminder_mail_subject' => 'Following issue will be Due shortly' ,
            'reminder_days_treshold' => 2,
            'reminder_store_as_note' => OFF,
            'reminder_sender' => 'admin@example.com',
            'reminder_bug_status' => array(ASSIGNED),
            'reminder_ignore_unset' => ON,
            'reminder_ignore_past' => ON,
            'reminder_handler' => ON,
            'reminder_group_issues' => ON,
            'reminder_group_project' => OFF,
            'reminder_manager_overview' => ON,
            'reminder_group_subject' => "You have issues approaching their Due Date",
            'reminder_group_body1' => "Please review the following issues",
            'reminder_group_body2' => "Please do not reply to this message",
            'reminder_project_id' => 0,
            'reminder_login' => 'admin',
            'reminder_feedback_project' => 0,
            'reminder_feedback_status' => array(FEEDBACK),
            'reminder_subject' => 'Issues requiring your attention',
            'reminder_finished' => 'Finished processing your selection',
            'reminder_hours' => OFF,
            'reminder_colsep' => ';',
        );
    }

    /**
     * Hook into Manage menu
     */
    function init()
    {
        plugin_event_hook('EVENT_MENU_MANAGE', 'remDown');
    }

    /**
     * Return the Reminder url
     *
     * @return array
     */
    function remDown()
    {
        return array('<a href="'. plugin_page('bug_due_overview.php') . '">' . lang_get('reminder_download') . '</a>' );
    }
}
