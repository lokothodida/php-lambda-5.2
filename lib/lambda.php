<?php

// function($params) {
  $params = array_merge(array(
    "args" => "",
    "fn" => "",
    "use" => array(),
  ),$params);

  if (is_array($params["args"])) {
    $params["args"] = implode(",", $params["args"]);
  } else {
    $params["args"] = (string) $params["args"];
  }

  $declarations = "";

  foreach ($params["use"] as $var => $value) {
    // http://davidwalsh.name/php-serialize-unserialize-issues
    $declarations .= $var . "= unserialize(base64_decode('" . base64_encode(serialize($value)) . "'));";
  }

  if (strtolower(substr($params["fn"], -4)) == ".php") {
    $params["fn"] = "return include('" . $params["fn"] . "')";
  }

  $params["fn"] = $declarations . $params["fn"] . ";";

  return create_function($params["args"], $params["fn"]);
// }



