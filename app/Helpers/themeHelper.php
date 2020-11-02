<?php

if(!function_exists('themeCss')){
    /**
     * Get General theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function themeCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('themeJs')){
    /**
     * Get general theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function themeJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('themeSectionCss')){
    /**
     * Get general theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function themeSectionCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/section/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('theme/assets/css/section/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('themeSectionJs')){
    /**
     * Get general theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function themeSectionJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/section/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('theme/assets/js/section/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('themeCssUrl')){
    /**
     * Get the URL of a general theme's CSS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function themeCssUrl($url, $ext='css'){
        return asset('theme/assets/css/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeJsUrl')){
    /**
     * Get the URL of a general theme's JS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function themeJsUrl($url, $ext='js'){
        return asset('theme/assets/js/' . $url . '.' . $ext);
    }
}
if(!function_exists('themeImageUrl')){
    /**
     * Get the URL of a general theme's image file
     * @param $image
     * @return string
     */
    function themeImageUrl($image){
        return asset('theme/assets/images/' . $image);
    }
}
