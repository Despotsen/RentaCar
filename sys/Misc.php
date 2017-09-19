<?php
/**
 * Class used for work with links and url-s
 */
class Misc {
    /**
     * Link
     * @param type $url URL of link
     * @return type Return url
     */
    public static function link($url) {
        return Configuration::BASE_URL . $url;
    }
    
    /**
     * Used to set up url
     * @param type $url URL from other function up on this
     * @param type $title Title for app
     * @param type $class Class to be added
     */
    public static function url($url, $title, $class = '') {
        echo '<a href="' . Misc::link($url) . '" class="' . $class . '">' . htmlspecialchars($title) . '</a>';
    }
    
    /**
     * Reddirect us to given url
     * @param type $url Url to be reddirected
     */
    public static function redirect($url) {
        ob_clean();
        header('Location: ' . Misc::link($url));
        exit;
    }
}
