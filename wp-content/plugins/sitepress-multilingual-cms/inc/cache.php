<?php

if ( ! defined( 'ICL_DISABLE_CACHE' ) ) {
	define( 'ICL_DISABLE_CACHE', false );
}

function icl_disable_cache() {
	return 	defined( 'ICL_DISABLE_CACHE' ) && ICL_DISABLE_CACHE;
}

function icl_cache_get( $key ) {
	$result = false;
	if ( ! icl_disable_cache() ) {
		$icl_cache = get_option( '_icl_cache' );

		$result = isset( $icl_cache[ $key ] ) ? $icl_cache[ $key ] : false;
	}

	return $result;
}

function icl_cache_set( $key, $value = null ) {

	global $switched;
	if ( empty( $switched ) && ! icl_disable_cache() ) {
		$icl_cache = get_option( '_icl_cache' );
		if ( false === $icl_cache ) {
			delete_option( '_icl_cache' );
		}

		if ( ! isset( $icl_cache[ $key ] ) || $icl_cache[ $key ] != $value ) {
			if ( ! is_null( $value ) ) {
				$icl_cache[ $key ] = $value;
			} elseif ( isset( $icl_cache[ $key ] ) ) {
				unset( $icl_cache[ $key ] );
			}

			update_option( '_icl_cache', $icl_cache );
		}
	}
}

function icl_cache_clear( $key = false, $key_as_prefix = false ) {
	if ( empty( $switched ) && ! icl_disable_cache() ) {
		/**
		 * @var WPML_Term_Translation $wpml_term_translations
		 * @var WPML_Post_Translation $wpml_post_translations
		 */
		global $wpml_term_translations, $wpml_post_translations;

		$wpml_term_translations->reload();
		$wpml_post_translations->reload();

		if ( $key === false ) {
			delete_option( '_icl_cache' );
		} else {
			$icl_cache = get_option( '_icl_cache' );

			if ( is_array( $icl_cache ) ) {
				if ( isset( $icl_cache[ $key ] ) ) {
					unset( $icl_cache[ $key ] );
				}

				if ( $key_as_prefix ) {
					$cache_keys = array_keys( $icl_cache );
					foreach ( $cache_keys as $cache_key ) {
						if ( strpos( $cache_key, $key ) === 0 ) {
							unset( $icl_cache[ $key ] );
						}
					}
				}

				// special cache of 'per language' - clear different statuses
				if ( false !== strpos( $key, '_per_language' ) ) {
					foreach ( $icl_cache as $k => $v ) {
						if ( false !== strpos( $k, $key . '#' ) ) {
							unset( $icl_cache[ $k ] );
						}
					}
				}
				update_option( '_icl_cache', $icl_cache );
			}
		}
	}
	do_action( 'wpml_cache_clear' );
}

class icl_cache{
   
    private $data;
    
    function __construct($name = "", $cache_to_option = false){
        $this->data = array();
        $this->name = $name;
        $this->cache_to_option = $cache_to_option;
        
        if ($cache_to_option) {
            $this->data = icl_cache_get($name.'_cache_class');
            if ($this->data == false){
                $this->data = array();
            }
        }
    }
    
    function get($key) {
        if(ICL_DISABLE_CACHE){
            return null;
        }
        return isset($this->data[$key]) ? $this->data[$key] : false;
    }
    
    function has_key($key){
        if(ICL_DISABLE_CACHE){
            return false;
        }
        return array_key_exists($key, (array)$this->data);
    }
    
    function set($key, $value) {
        if(ICL_DISABLE_CACHE){
            return;
        }
        $this->data[$key] = $value;
        if ($this->cache_to_option) {
            icl_cache_set($this->name.'_cache_class', $this->data);
        }
    }
    
    function clear() {
        $this->data = array();
        if ($this->cache_to_option) {
            icl_cache_clear($this->name.'_cache_class');
        }
    }
}

function w3tc_translate_cache_key_filter( $key ) {
	global $sitepress;

	return $sitepress->get_current_language() . $key;
}