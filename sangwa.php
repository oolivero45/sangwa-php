function random() {
  return (float)rand()/(float)getrandmax();
}

function sangwa_key($value) {
  $a = str_split("~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?" . "~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?");
  if (gettype($value) === "string") {
    return strpos("~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?", $value);
  } else if (gettype($value) === "double" || gettype($value) === "integer") {
    if ($value >= 0) {
      $a[$value];
      return $a[$value];
    } else {
      return $a[strlen("~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?") + $value];
    }
  } else {
    return str_split("~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?" . "~!1@2#3$4%5^6&7*8(9)0_-=+ qQwWeErRtTyYuUiIoOpP[{]}\\|aAsSdDfFgGhHjJkKlL;:\"'zZxXcCvVbBnNmM,<.>/?");
  }
}

function sangwa_encode($value) {
  $result = "";
  $rand = floor(random() * 6) + 2;
  $value = "A" . $value;
  for ($i = 0; $i < strlen($value); $i++) {
    $result = $result . sangwa_key(sangwa_key($value[$i]) + $rand);
  }
  return $result;
}

function sangwa_decode($value) {
  $result = "";
  $rand = intval(sangwa_key($value[0]) - sangwa_key("A"));
  for ($i = 1; $i < strlen($value);$i++) {
    $result = $result . sangwa_key(sangwa_key($value[$i]) - $rand);
  }
  return $result;
}
