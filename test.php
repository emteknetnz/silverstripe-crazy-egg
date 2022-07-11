<?php
    preg_match_all("#\*.+\[(.+?)\]#", shell_exec("git show-branch -a 2>/dev/null"), $m);
    $cur = trim(shell_exec("git rev-parse --abbrev-ref HEAD"));
    echo array_merge(array_filter($m[1], function($v) use ($cur) { return $v != $cur; }))[0] ?? '';
