<?php

$capabilities = array(

  'blocks/searchunipicourses:view' => array(
      'riskbitmask' => RISK_PERSONAL,
      'captype' => 'read',
      'contextlevel' => CONTEXT_COURSE,
      'legacy' => array(
        'guest'          => CAP_ALLOW,
        'student'        => CAP_ALLOW,
        'teacher'        => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'coursecreator'  => CAP_ALLOW,
        'manager'          => CAP_ALLOW
        )
    ),
    'block/searchunipicourses:myaddinstance' => array(
      'riskbitmask' => RISK_PERSONAL,
      'captype' => 'read',
      'contextlevel' => CONTEXT_COURSE,
      'legacy' => array(
        'guest'          => CAP_ALLOW,
        'student'        => CAP_ALLOW,
        'teacher'        => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'coursecreator'  => CAP_ALLOW,
        'manager'          => CAP_ALLOW
        )
     ),
         'block/searchunipicourses:addinstance' => array(
      'riskbitmask' => RISK_PERSONAL,
      'captype' => 'read',
      'contextlevel' => CONTEXT_COURSE,
      'legacy' => array(
        'guest'          => CAP_ALLOW,
        'student'        => CAP_ALLOW,
        'teacher'        => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'coursecreator'  => CAP_ALLOW,
        'manager'          => CAP_ALLOW
        )
     )
);