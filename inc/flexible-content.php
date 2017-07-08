<?php

if( have_rows('flexible') ):

    while ( have_rows('flexible') ) : the_row();

        if( get_row_layout() == 'section' ):
		
		$holder_width = get_sub_field('holder_width');
		if($holder_width == "100") $holder_width = "regular";
		else $holder_width = "slim";
		$extra_class = get_sub_field('extra_class');
		echo "<section class='$extra_class'><div class='container $holder_width'>";
			
			$row_count = count(get_sub_field('columns'));
        	if( have_rows('columns') ):
			
			 	// loop through the rows of data
			    while ( have_rows('columns') ) : the_row();
					switch ($row_count) {
						case 1: $col_width = "sm-12"; break;
						case 2: $col_width = "sm-6"; break;
						case 3: $col_width = "sm-4"; break;
						case 4: $col_width = "sm-3"; break;
					}
					$col = get_sub_field('column');

					echo "<div class='col-$col_width'>" . $col . "</div>";

				endwhile;

			endif;

        endif;
	
	echo "</div></section>";

    endwhile;

else :

    // no layouts found

endif;
?>