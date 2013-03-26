<?php
	function nurble( $text ) {
		$nurbled_text = change_to_uppercase( $text );
		$nurbled_text = replace_everything_but_nouns_with( 'nurble', $in = $nurbled_text );
		$nurbled_text = replace_newlines_with_br_tags( $nurbled_text );
		return $nurbled_text;
	}

	function change_to_uppercase( $text ) { return strtoupper( $text ); }

	function replace_everything_but_nouns_with( $replacement_word = 'nurble', $text ) {
		$non_nouns = get_non_nouns_from( $text );

		$modified_text = str_ireplace(
			$search = $non_nouns,
			$replace = '<span class="' . $replacement_word . '">' . $replacement_word . '</span>',
			$subject = $text
		);

		return $modified_text;
	}

	function get_non_nouns_from( $text ) {
		$individual_words = get_individual_words_from( $text );

		$all_known_nouns_in_lowercase = file( "nouns.txt", FILE_IGNORE_NEW_LINES );
		$non_nouns = array();

		foreach ( $individual_words as $word ) {
			$word_is_not_a_noun = ! in_array( change_to_lowercase( $word ), $all_known_nouns_in_lowercase );
			if ( $word_is_not_a_noun ) $non_nouns[] = $word;
		}

		return $non_nouns;
	}

	function get_individual_words_from( $text ) {
		$only_letters_and_spaces = preg_replace( '/[^a-zA-Z ]/', '', $text );
		$individual_words = explode( ' ', $only_letters_and_spaces );
		return $individual_words;
	}

	function change_to_lowercase( $text ) { return strtolower( $text ); }

	function replace_newlines_with_br_tags( $text ) { return nl2br( $text ); }
