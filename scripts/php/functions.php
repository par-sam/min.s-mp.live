<?php
    function badge($text = "badge", $color = "blue", $size = "sm") {
        return "<span class=\"bg-$color-500 text-white rounded-md px-2 text-$size font-semibold text-center\">$text</span>";
    }