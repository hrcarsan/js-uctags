<?php

error_reporting(E_ERROR);

$tmp_file  = "/tmp/test.js";
$test_code = explode("\n", file_get_contents("input.js"));
$tests     = array();
$t         = 0;

foreach ($test_code as $n => $line)
{
  if (preg_match("/^\/\/tags>>>>(.+)$/", $line, $match))
  {
    $tests[$t]['tags'] = explode(" ", $match[1]);
    $tests[$t]['id']   = $n+1;
    $t++;
  }
  else $tests[$t]['code'] .= "$line\n";
}

foreach ($tests as $test)
{
  if (!$test['tags']) continue;
  file_put_contents($tmp_file, $test['code']);
  $ctags = explode("\n", shell_exec("ctags --options=../js.ctags -o - $tmp_file"));
  $tags  = array();
  
  foreach ($ctags as $ctag)
  {
    if (!$ctag) continue;
    $parts  = explode("\t", $ctag, 2);
    $tags[] = $parts[0];
  }

  $result = $tags == $test['tags']? "OK": "FAIL";
  print_r($test['id']." ".implode(" ", $test['tags'])." $result\n");

  if ($result == 'FAIL') break;
}

unlink($tmp_file);
?>
