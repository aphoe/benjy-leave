<?php
if(!function_exists('backCss')){
    /**
     * Get Backend's theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function backCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('backJs')){
    /**
     * Get backend's theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function backJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('backSectionCss')){
    /**
     * Get Backend's theme CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function backSectionCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/section/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/section/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}

if(!function_exists('backSectionJs')){
    /**
     * Get backend's theme JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function backSectionJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('backCssUrl')){
    /**
     * Get the URL of a backend theme's CSS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function backCssUrl($url, $ext='css'){
        return asset('backend/assets/css/' . $url . '.' . $ext);
    }
}
if(!function_exists('backJsUrl')){
    /**
     * Get the URL of a backend theme's JS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function backJsUrl($url, $ext='js'){
        return asset('backend/assets/js/' . $url . '.' . $ext);
    }
}

if(!function_exists('backSectionCssUrl')){
    /**
     * Get the URL of a backend theme's section CSS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function backSectionCssUrl($url, $ext='css'){
        return asset('backend/assets/css/section/' . $url . '.' . $ext);
    }
}
if(!function_exists('backSectionJsUrl')){
    /**
     * Get the URL of a backend theme's section JS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function backJsSectionUrl($url, $ext='js'){
        return asset('backend/assets/js/section/' . $url . '.' . $ext);
    }
}
if(!function_exists('backValidationJs')){
    /**
     * Get backend's validation settings JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function backValidationJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/validation/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/validation/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}

if(!function_exists('backValidationJsUrl')){
    /**
     * Get the URL of a backend validation settings JS file
     * @param $url
     * @param string $ext
     * @return string
     */
    function backValidationJsUrl($url, $ext='js'){
        return asset('backend/assets/js/section/validation/' . $url . '.' . $ext);
    }
}
if(!function_exists('backComponentCss')){
    /**
     * Get Backend's component's CSS file as HTML tag
     * @param $css
     * @return null|string
     */
    function backComponentCss($css){
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/section/component/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/css/section/component/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}
if(!function_exists('backComponentJs')){
    /**
     * Get backend's component's JS file as HTML tag
     * @param $js
     * @return null|string
     */
    function backComponentJs($js){
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/component/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/js/section/component/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}
if(!function_exists('backImageUrl')){
    /**
     * Get the URL of a backend theme's image file
     * @param $image
     * @return string
     */
    function backImageUrl($image){
        return asset('backend/assets/images/' . $image);
    }
}
if(!function_exists('backFolderFileUrl')){
    /**
     * Get the URL of a file in one of the backend assets folders
     * @param string $file
     * @return string
     */
    function backFolderFileUrl(string $file): string{
        return asset('backend/assets/' . $file);
    }
}
if(!function_exists('backLibCss')){
    /**
     * HTML tag for CSS in backend Lib folder
     * @param $css
     * @return string
     */
    function backLibCss($css): string{
        $styles = null;
        if(is_array($css)){
            foreach($css as $c){
                $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/libs/' . $c .'.css') . '">' . "\r\n";
            }
        }else{
            $styles .= '<link rel="stylesheet" href="' . asset('backend/assets/libs/' . $css .'.css') . '">' . "\r\n";
        }

        return $styles;
    }
}
if(!function_exists('backLibJs')){
    /**
     * HTML tag for JS in backend Lib folder
     * @param $js
     * @return string
     */
    function backLibJs($js): string{
        $scripts = null;
        if(is_array($js)){
            foreach($js as $j){
                $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/libs/' . $j . '.js') . '"></script>' . "\r\n";
            }
        }else{
            $scripts .= '<script type="text/javascript" src="' . asset('backend/assets/libs/' . $js . '.js') . '"></script>' . "\r\n";
        }

        return $scripts;
    }
}
if(!function_exists('backLibCssUrl')){
    /**
     * URL of CSS in backend's Lib folder
     * @param string $url
     * @param string $ext
     * @return string
     */
    function backLibCssUrl(string $url, string $ext='css'): string{
        return asset('backend/assets/libs/' . $url . '.' . $ext);
    }
}
if(!function_exists('backLibJsUrl')){
    /**
     * URL of JS in backend's Lib folder
     * @param string $url
     * @param string $ext
     * @return string
     */
    function backLibJsUrl(string $url, string $ext='js'): string {
        return asset('backend/assets/libs/' . $url . '.' . $ext);
    }
}
if(!function_exists('backLibFileUrl')){
    /**
     * URL of a file in backend's Lib folder
     * @param string $file
     * @return string
     */
    function backLibFileUrl(string $file): string {
        return asset('backend/assets/libs/' . $file);
    }
}
if(!function_exists('breadcrumbs')){
    /**
     * Generate breadcrumbs HTM tags
     * @param $crumbs
     * @return string
     */
    function breadcrumbs($crumbs): string {
        if(!is_array($crumbs) || count($crumbs) < 1){
            return '';
        }

        $bread = '<nav aria-label="breadcrumb" class="float-right mt-1">'   . "\r\n"
                 . '<ol class="breadcrumb">'   . "\r\n"
                 . '<li class="breadcrumb-item"><a href="' . url('/dashboard') . '">Home</a></li>'   . "\r\n";
        foreach ($crumbs as $key=>$val){
            if($key != 'active'){
                $bread .= '<li class="breadcrumb-item"><a href="' . url($key) . '">' . ucwords($val) . '</a></li>' . "\r\n";
            }else{
                $bread .= '<li class="breadcrumb-item active" aria-current="page">' . ucwords($val) . '</li>' . "\r\n";
            }
        }

        $bread .= '</ol></nav>';

        return $bread;
    }
}

