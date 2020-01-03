<?php

    function best_attachments_path($path = '')
    {
        return public_path('bestsellers'.($path ? DIRECTORY_SEPARATOR.$path : $path));
    }

    function fashions_attachments_path($path = '')
    {
        return public_path('fashion'.($path ? DIRECTORY_SEPARATOR.$path : $path));
    }
?>