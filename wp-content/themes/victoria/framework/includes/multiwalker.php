<?php
class multi_Walker extends Walker_Category {
			function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0){
				extract($args);
				$cat_name = esc_attr( $object->name);
				$cat_name = apply_filters( 'list_cats', $cat_name, $object );
				$link = '<a class="'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'" data-value="'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'"  href="#" ';
				if ( $use_desc_for_title == 0 || empty($object->description) )
					$link .= 'title="' . sprintf(__( 'View all posts filed under %s','ATP_ADMIN_SITE' ), $cat_name) . '"';
				else
					$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'object_description', $object->description, $object ) ) ) . '"';
					$link .= '>';

				if ( isset($show_count) && $show_count )
					$link .= $cat_name . ' (' . intval($object->count) . ')</a>';
				else
					$link .= $cat_name . '</a>';

				if ( (! empty($feed_image)) || (! empty($feed)) ) {
					$link .= ' ';
					if ( empty($feed_image) )

					$link .= '(';
					$link .= '<a href="' . get_object_feed_link($object->term_id, $feed_type) . '"';

					if ( empty($feed) )
						$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s','ATP_ADMIN_SITE'), $cat_name ) . '"';
					else {
						$title = ' title="' . $feed . '"';
						$alt = ' alt="' . $feed . '"';
						$name = $feed;
						$link .= $title;
					}

					$link .= '>';
					if ( empty($feed_image) )
						$link .= $name;
					else
						$link .= "<img src='$feed_image'$alt$title" . ' />';
						$link .= '</a>';

					if ( empty($feed_image) )
						$link .= ')';
				}

				if ( isset($show_date) && $show_date ) {
					$link .= ' ' . gmdate('Y-m-d', $object->last_update_timestamp);
				}

				if ( isset($current_object) && $current_object )
				$_current_object = get_object( $current_object );
			
				if ( 'list' == $args['style'] ) {
					$output .= '<li class="segment-'.rand(1,9).'"';
					//$class = 'cat-item cat-item-'.$object->term_id;
					if ( isset($current_object) && $current_object && ($object->term_id == $current_object) )
						$class .=  ' current-cat';
					elseif ( isset($_current_object) && $_current_object && ($object->term_id == $_current_object->parent) )
						$class .=  ' current-cat-parent';
						$output .=  ' class="'.$class.'"';
						$output .= ">$link\n";
				} else {
					$output .= "\t$link<br />\n";
				}
			}
		}
		/**
		 * Multiple taxonomies
		 */
		function multi_tax_terms($where) {
			global $wp_query;
			global $wpdb;
			if (isset($wp_query->query_vars['term']) && (strpos($wp_query->query_vars['term'], ',') !== false && strpos($where, "AND 0") !== false)) {
				//Get the terms
				$term_arr = explode(",", $wp_query->query_vars['term']);
				foreach ($term_arr as $term_item) {
					$terms[] = get_terms($wp_query->query_vars['taxonomy'], array(
						'slug' => $term_item
					));
				} //$term_arr as $term_item
				
				//Get the id of posts with that term in that taxonomy
				foreach ($terms as $term) {
					$term_ids[] = $term[0]->term_id;
				} //$terms as $term
				
				$post_ids = get_objects_in_term($term_ids, $wp_query->query_vars['taxonomy']);
				
				if (!is_wp_error($post_ids) && count($post_ids)) {
					// Build the new query
					$new_where = " AND $wpdb->posts.ID IN (" . implode(', ', $post_ids) . ") ";
					$where     = str_replace("AND 0", $new_where, $where);
				}else {
				}
			} //isset $wp_query
			return $where;
		}
		add_filter("posts_where", "multi_tax_terms");
?>