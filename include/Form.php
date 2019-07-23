<?php
class Form implements ArrayAccess {

  private $data;
  private $validators;
  private $errors;
  
  public function __construct($fields = array()) {
    $this->errors = array();
    foreach ($fields as $field => $validators) {
      $this->addField($key, $validator);
    }
  }
  
  public function addField($key, $validators) {
    $this->data[$key] = '';
    $this->validators[$key] = $validators;
  }
  
  public function validate() {
    foreach ($this->validators as $key => $validators) {
      foreach ($validators as $validator) {
        $result = $validator($key, $this->data[$key]);
        if ($result) {
          if (!isset($this->errors[$key])) {
            $this->errors[$key] = array();
          }
          $this->errors[$key][] = $result;
        }
      }
    }
  }

  public static function required($key, $value) {
    return trim($value) ? false : "$key is required";
  }
  
  public static function password($key, $value) {
    return strlen(trim($value)) >= 8;
  }
  
  public function offsetExists($offset) {
    return isset($this->data[$offset]);
  }

  public function offsetGet($offset) {
    return $this->data[$offset];
  }

  public function offsetSet($offset , $value) {
    $this->data[$offset] = $value;
  }

  public function offsetUnset($offset) {
    unset($this->data[$offset]);
  }
}
?>