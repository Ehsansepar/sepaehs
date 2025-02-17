<?php

try {
    $Output = "Hello World !";
}
finally {
    echo json_encode($Output, JSON_FORCE_OBJECT);
}

?>