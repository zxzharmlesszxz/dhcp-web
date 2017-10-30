<?php

/**
* View Class
**/

//namespace Core;

class View {
 /**
 * Input: content_view
 *        template_view
 *        data
 * Output: none
 **/
 public function generate($content_view, $template_view, $data = null) {
  include config()->VIEWS_PATH.'/'.$template_view;
 }

 /**
 * Input: mixed
 * Output: json array
 **/
 public function ajax($data = null) {
  header('Content-Type: application/json');
  echo json_encode($data);
 }

 /**
 * Input: mixed
 * Output: string
 **/
 public function debug($data = null) {
  var_dump($data);
 }
}
