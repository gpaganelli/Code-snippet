$result = db_select('field_data_field_na_system_control_number', 'n')
   ->fields('n')
   ->condition('entity_id', 110770 ,'=')
   ->execute()
   ->fetchAssoc();

print_r($result);


