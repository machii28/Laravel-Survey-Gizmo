<?php

return [

    /*
     |--------------------------------------------------------------------
     | Survey ID
     |--------------------------------------------------------------------
     |
     | The unique id for a certain survety
     |
     */
    'survey_id'  => env('SURVEY_GIZMO_SURVEY_ID', ''),

    /*
     |--------------------------------------------------------------------
     | API Key
     |--------------------------------------------------------------------
     |
     | API key generated for accessing the SurveyGizmo
     |
     */
    'api_key'    => env('SURVEY_GIZMO_API_KEY', ''),

    /*
     |--------------------------------------------------------------------
     | API Secret
     |--------------------------------------------------------------------
     |
     | Secret key generated for accessing the SurveyGizmo
     |
     */
    'api_secret_token' => env('SURVEY_GIZMO_API_SECRET', ''),

    /*
     |--------------------------------------------------------------------
     | API url
     |--------------------------------------------------------------------
     |
     | API url located in https://apihelp.surveygizmo.com/help
     | The current version is Version 5
     |
     */
    'api_url' => 'restapi.surveygizmo.com/v5',

];