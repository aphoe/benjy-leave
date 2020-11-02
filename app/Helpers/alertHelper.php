<?php
/**
 * Display bootstrap alert
 */

if(!function_exists('htmlBackAlert')){
    /**
     * displays bootstraps alert box for back end theme
     * @param $type
     * @param $msg
     * @param bool $dismissable
     * @return bool|html
     */
    function htmlBackAlert($type, $msg, $dismissable=false){
        switch($type){
            case 'primary':
                $icon = 'uil uil-bell';
                $class = 'primary';
                break;
            case 'secondary':
                $icon = 'uil uil-volume';
                $class = 'secondary';
                break;
            case 'success':
                $icon = 'uil uil-check-circle';
                $class = 'success';
                break;
            case 'info':
                $icon = 'uil uil-info-circle';
                $class = 'info';
                break;
            case 'warning':
                $icon = 'uil uil-exclamation-triangle';
                $class = 'warning';
                break;
            case 'danger':
                $icon = 'uil uil-times-circle';
                $class = 'danger';
                break;

            default:
                return false;
        }

        ?>
        <div class="alert alert-<?php echo $class;?> <?php if($dismissable){ echo 'alert-dismissible'; }?>" role="alert">
            <?php if($dismissable): ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php endif; ?>
            <i class="<?php echo $icon; ?>"></i>
            <span><?php echo $msg; ?></span>
        </div>
        <?php
    }
}

if(!function_exists('htmlFrontAlert')){
    /**
     * displays bootstraps alert box for frontend theme
     * @param $type
     * @param $msg
     * @param bool $dismissable
     * @return bool|html
     */
    function htmlFrontAlert($type, $msg, $dismissable=false){
        switch($type){
            case 'success':
                $icon = 'icon-check';
                $class = 'success';
                break;
            case 'info':
                $icon = 'icon-info';
                $class = 'info';
                break;
            case 'warning':
                $icon = 'icon-info';
                $class = 'warning';
                break;
            case 'danger':
                $icon = 'icon-close';
                $class = 'error';
                break;
            case 'notice':
                $icon = 'icon-volume-2';
                $class = 'notice';
                break;
            case 'message':
                $icon = 'icon-bell';
                $class = 'message';
                break;

            default:
                return false;
        }

        ?>
        <div class="container my-3">
            <div class="col-12">
                <div class="alert <?php echo $class; ?> ">
                    <div class="alert_body">
                        <i class="<?php echo $icon; ?>"></i>
                        <span><?php echo $msg; ?></span>
                    </div>
                    <?php if($dismissable): ?>
                        <div class="alert_close"><i class="icon_close"></i></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
