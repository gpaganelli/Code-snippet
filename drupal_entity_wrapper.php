<?php 

$name = 'Example';

$node = node_load($nid);
$wrapper = entity_metadata_wrapper('node', $node);

//city_mls is machine name taxonomy
$vocab = taxonomy_vocabulary_machine_name_load('city_mls');
$vid = $vocab->vid;

$tid= custom_create_taxonomy_term($name, $vid);

$wrapper->field_my_term_reference->set($tid);
$wrapper->save();



function custom_create_taxonomy_term($name, $vid) {
  $term_name = taxonomy_get_term_by_name($name);
  if (is_array($term_name)) {
    $term_name = array_values($term_name)[0];
    if (isset($term_name->name)) {
    	//if there is a term, return the id of the term
      return $term_name->tid;
    }else{
    	//if there is no term it creates the term and returns the id
      $term = new stdClass();
      $term->name = $name;
      $term->vid = $vid;
      taxonomy_term_save($term);
      return $term->tid;
    }
  }else{
	//if there is no term it creates the term and returns the id
    $term = new stdClass();
    $term->name = $name;
    $term->vid = $vid;
    taxonomy_term_save($term);
    return $term->tid;
  }