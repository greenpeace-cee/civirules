<?php
use CRM_Civirules_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_CiviRules',
    'entity' => 'SavedSearch',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'CiviRules',
        'label' => E::ts('CiviRules'),
        'api_entity' => 'CiviRulesRule',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'label',
            'MIN(CiviRulesRule_CiviRulesTrigger_trigger_id_01.label) AS MIN_CiviRulesRule_CiviRulesTrigger_trigger_id_01_label',
            'GROUP_CONCAT(DISTINCT CiviRulesRule_CiviRulesRuleTag_rule_id_01.rule_tag_id:label) AS GROUP_CONCAT_CiviRulesRule_CiviRulesRuleTag_rule_id_01_rule_tag_id_label',
            'description',
            'is_active',
            'modified_date',
            'modified_user_id.display_name',
            'modified_user_id',
            'MAX(CiviRulesRule_CiviRulesRuleLog_rule_id_01.log_date) AS MAX_CiviRulesRule_CiviRulesRuleLog_rule_id_01_log_date',
          ],
          'orderBy' => [],
          'where' => [],
          'groupBy' => [
            'id',
          ],
          'join' => [
            [
              'CiviRulesTrigger AS CiviRulesRule_CiviRulesTrigger_trigger_id_01',
              'INNER',
              [
                'trigger_id',
                '=',
                'CiviRulesRule_CiviRulesTrigger_trigger_id_01.id',
              ],
            ],
            [
              'CiviRulesRuleTag AS CiviRulesRule_CiviRulesRuleTag_rule_id_01',
              'LEFT',
              [
                'id',
                '=',
                'CiviRulesRule_CiviRulesRuleTag_rule_id_01.rule_id',
              ],
            ],
            [
              'CiviRulesRuleLog AS CiviRulesRule_CiviRulesRuleLog_rule_id_01',
              'LEFT',
              [
                'id',
                '=',
                'CiviRulesRule_CiviRulesRuleLog_rule_id_01.rule_id',
              ],
            ],
          ],
          'having' => [],
        ],
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_CiviRules_SearchDisplay_CiviRules_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'CiviRules_Table_1',
        'label' => E::ts('CiviRules List'),
        'saved_search_id.name' => 'CiviRules',
        'type' => 'table',
        'settings' => [
          'description' => NULL,
          'sort' => [
            [
              'label',
              'ASC',
            ],
          ],
          'limit' => 50,
          'pager' => [],
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'id',
              'dataType' => 'Integer',
              'label' => E::ts('ID'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'label',
              'dataType' => 'String',
              'label' => E::ts('Label'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'MIN_CiviRulesRule_CiviRulesTrigger_trigger_id_01_label',
              'dataType' => 'String',
              'label' => E::ts('Trigger'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'GROUP_CONCAT_CiviRulesRule_CiviRulesRuleTag_rule_id_01_rule_tag_id_label',
              'dataType' => 'Integer',
              'label' => E::ts('Tags'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'description',
              'dataType' => 'String',
              'label' => E::ts('Description'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'is_active',
              'dataType' => 'Boolean',
              'label' => E::ts('Enabled'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'modified_date',
              'dataType' => 'Date',
              'label' => E::ts('Modified Date'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'modified_user_id.display_name',
              'dataType' => 'String',
              'label' => E::ts('Modified By'),
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'modified_user_id',
                'target' => '_blank',
              ],
              'title' => E::ts('View Modified By'),
            ],
            [
              'type' => 'field',
              'key' => 'MAX_CiviRulesRule_CiviRulesRuleLog_rule_id_01_log_date',
              'dataType' => 'Timestamp',
              'label' => E::ts('Last triggered'),
              'sortable' => TRUE,
            ],
            [
              'size' => 'btn-xs',
              'links' => [
                [
                  'path' => 'civicrm/civirule/form/rule?reset=1&action=update&id=[id]',
                  'icon' => 'fa-external-link',
                  'text' => E::ts('Edit'),
                  'style' => 'default',
                  'condition' => [],
                  'task' => '',
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => '',
                ],
                [
                  'task' => 'disable',
                  'entity' => 'CiviRulesRule',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-toggle-off',
                  'text' => E::ts('Disable'),
                  'style' => 'default',
                  'path' => '',
                  'action' => '',
                  'condition' => [
                    'is_active',
                    '=',
                    TRUE,
                  ],
                ],
                [
                  'task' => 'enable',
                  'entity' => 'CiviRulesRule',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-toggle-on',
                  'text' => E::ts('Enable'),
                  'style' => 'default',
                  'path' => '',
                  'action' => '',
                  'condition' => [
                    'is_active',
                    '=',
                    FALSE,
                  ],
                ],
                [
                  'task' => 'delete',
                  'entity' => 'CiviRulesRule',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-trash',
                  'text' => E::ts('Delete'),
                  'style' => 'danger',
                  'path' => '',
                  'action' => '',
                  'condition' => [],
                ],
              ],
              'type' => 'buttons',
              'alignment' => 'text-right',
            ],
          ],
          'actions' => TRUE,
          'classes' => [
            'table',
            'table-striped',
          ],
          'headerCount' => TRUE,
          'toolbar' => [
            [
              'path' => 'civicrm/civirule/form/rule?reset=1&action=add',
              'text' => E::ts('Add Rule'),
              'icon' => 'fa-plus',
              'style' => 'primary',
              'task' => '',
              'entity' => '',
              'action' => '',
              'join' => '',
              'target' => '',
              'condition' => [],
            ],
          ],
          'cssRules' => [
            [
              'disabled',
              'is_active',
              '=',
              FALSE,
            ],
          ],
        ],
      ],
      'match' => [
        'name',
      ],
    ],
  ],
];

