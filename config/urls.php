<?php
return [
    'sso_token' => env('SINGLE_SIGN_ON') . '/oauth/token',

    'hrm_organization' => env('HUMAN_RESOURCE_MANAGEMENT') . '/api/v1/organization',
    'hrm_employee' => env('HUMAN_RESOURCE_MANAGEMENT') . '/api/v1/employee'
];
