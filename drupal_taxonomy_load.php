
$vocab = taxonomy_vocabulary_machine_name_load('name_authority');

$term1 = (object) array(
'name' => '001 Term 1',
'description' => 'This is term 1',
'vid' => $vocab->vid,
);

taxonomy_term_save($term1);